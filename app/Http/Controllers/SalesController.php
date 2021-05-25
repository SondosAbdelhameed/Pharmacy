<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

use App\Models\Item;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\TaxSetting;
use App\Models\Category;
use App\Models\SaleBill;
use App\Models\SaleBillItem;
use App\Models\Product;
use App\Models\ProductDate;
use App\Models\TreeAccount;
use App\Models\AccountingEntry;
use App\Models\EntryAction;
use App\Models\User;
use App\Models\SaleBillItemProduct;
use App\Models\SaleBillPayment;
use App\Models\ReturnSaleBill;

class SalesController extends Controller
{
    
    /// emp tree ///
  private $sale_cash_tree = 48;
  private $sale_forward_tree = 49;

  private $sale_tax_tree = 79;

  /// user tree ///
  private $bank_tree = 65;
  private $safe_tree = 64;

    public function __construct(){
        $this->middleware('auth');
    }

    public function sale_point_page(){
        $products = Item::where('type','!=',2)->with('product')->limit('20')->get();
        //$products=0;
        $employees = Employee::all();
        $customers = Customer::where('type',0)->get();
        $tax = TaxSetting::find(2);
        $categories = Category::whereNull('parent_id')->get();

        return view('admin.sale.pointofsale',compact('categories','products','employees','customers','tax'));
    }

//***************************************************************************

    public function ajax_search_barcode($barcode_val)
    {
        $pro = Product::with('item')->where('barcode', $barcode_val)->first();
        if($pro == ''){
            $response['error'] = true;
            $response['status'] = 0;
            $response['message'] = "No Product"; 
        }else if($pro->total_quantity == 0){
            $response['error'] = true;
            $response['status'] = 1;
            $response['message'] = "There is No Quantity \n".$pro->barcode."-".$pro->item->name;
        }else{
            $response['pro'] = $pro;
            $response['error'] = false;
            $response['message'] = "Success";
        }
        return $response;
    }


    //////////////////////// bills ////////////////////////////////////

    public function show_all_bills($paginationVal,Request $request){

        $total_final = SaleBill::doesnthave('prescription_bills')->sum('total_final');
        //$paid_amount = SaleBill::sum('paid_amount');
        $paid_amount = 0;
        $remaining_amount = SaleBill::doesnthave('prescription_bills')->sum('remaining_amount');

        if(isset($request)){
            if(isset($request->search_val)){
              $bills = SaleBill::doesnthave('prescription_bills')->with('user')->with('customer')->
               where('bill_number', $request->search_val)->paginate(100);
            }else if(isset($request->date_from) && isset($request->date_to)){
                $bills = SaleBill::doesnthave('prescription_bills')->with('user')->with('customer')->
                whereBetween(DB::raw('DATE(created_at)'), [$request->date_from,$request->date_to])->paginate(100);
            }else{
                $bills = SaleBill::doesnthave('prescription_bills')->with('user')->with('customer')->paginate($paginationVal);
            }
        }else{  
            $bills = SaleBill::doesnthave('prescription_bills')->with('user')->with('customer')->paginate($paginationVal);
        }

        //return $bills;

        return view('admin.sale.managebill',compact('bills' , 'paginationVal' ,'total_final','paid_amount', 'remaining_amount'));
    }

    public function add_bill_page(){
        $employees = Employee::all();
        $customers = Customer::all();
        $tax = TaxSetting::find(2);
        return view('admin.sale.addbill',compact('employees','customers','tax'));
    }

    public function add_new_sale_bill(Request $request){
        //return $request;
        $a = array('5'=> 2);
        $a['6']=5;
        $a['test']='mmm';

        //return array_key_exists('6',$a);

        $this->validate($request, [
            'cus_id' => 'required',
            'bill_date' => 'required',
            'total_discount' => 'required',
            'total_before_tax' => 'required',
            'total_tax' => 'required',
            'final_total' => 'required',
            'paid_amount' => 'required',
            'remaining_amount' => 'required',
            'due_date' => 'required',
            'pay_way' => 'required',
            'bill_source' => 'required',
        ]);
        $cus = Customer::where('id',$request->cus_id)->with('tree')->first();
        $tot_entry_cost = 0;
        //return $cus;

        $bill = new SaleBill();
        $bill->bill_number = 0;
        $bill->bill_date = $request->bill_date;
        $bill->customer_id = $request->cus_id;
        $bill->employee_id = $request->employee_id;
        $bill->total_discount = $request->total_discount;
        $bill->total_before_tax = $request->total_before_tax;
        $bill->total_tax = $request->total_tax;
        $bill->total_final = $request->final_total;
        $bill->due_date = $request->due_date;
        $bill->bill_source = $request->bill_source;
        $bill->user_id = auth()->user()->id;

        $x = ($cus->tree->balance * -1) + $request->paid_amount;
        if($cus->type == 0){
            $bill->is_paid = 1;
            $bill->remaining_amount = $request->remaining_amount;
        }else{

            if($request->final_total <= $request->paid_amount){
                $bill->is_paid = 1;
                $bill->remaining_amount = $request->remaining_amount;
            }else if($x >= $request->final_total){
                $bill->is_paid = 1;
                $bill->remaining_amount = 0;
            }
            else{
                $bill->is_paid = 0;
                $bill->remaining_amount = $request->final_total-$x;
            }
        }
        $bill->save();
        $bill->bill_number = $bill->id;
        $bill->save();

        if($request->paid_amount > 0){
            $payment = new SaleBillPayment();
            $payment->bill_id = $bill->id;
            $payment->user_id = auth()->user()->id;
            $payment->pay_way = $request->pay_way;
            $payment->remaining_amount = $request->final_total - $request->paid_amount;
            if($request->pay_way == 0)
                $payment->cash = $request->paid_amount;
            else
                $payment->visa = $request->paid_amount;
            $payment->save();
        }

        foreach ($request->multi_product as $key => $product) {
            $item = Item::find($product);

            $bill_pro = new SaleBillItem();
            $bill_pro->bill_id = $bill->id;
            $bill_pro->item_id = $product;
            $bill_pro->price = ($request->multi_price)[$key];
            $bill_pro->product_discount = ($request->multi_discount)[$key];
            $bill_pro->tax_value = ($request->multi_tax_val)[$key];
            $bill_pro->quantity = ($request->multi_amount)[$key];
            $bill_pro->total_price = ($request->multi_total)[$key];
            $bill_pro->save();

            if($item->type != 3){
                $quantity = ($request->multi_amount)[$key];
                $q = 0;
                do{
                    $pro = Product::where('item_id',$product)->first();
                    $product_date = ProductDate::where('product_id',$pro->id)->where('quantity','!=',0)->first();
                    //return $pro;
                    if($product_date->quantity >= $quantity){
                        $product_date->quantity = $product_date->quantity - $quantity;
                        $q = $quantity;
                        $quantity = 0;
                    }else{
                        $q = $product_date->quantity;
                        $quantity -= $q;
                        $product_date->quantity = 0; 
                    }
                    //return $q;
                    $product_date->save();

                    $sale_pro = new SaleBillItemProduct();
                    $sale_pro->sale_bill_item_id = $bill_pro->id;
                    $sale_pro->product_date_id = $product_date->id;
                    $sale_pro->quantity = $q;
                    $sale_pro->save();

                    $tot_entry_cost += ($product_date->cost * $q);

                }while($quantity > 0);
            }
        }

        $entry = new AccountingEntry();
        $entry->type = 1;
        $entry->title_en = "Due sale invoice number".$bill->id;
        $entry->title_ar = "إستحقاق فاتورة بيع رقم".$bill->id;
        $entry->date = date('Y-m-d');
        $entry->description = "إستحقاق فاتورة بيع رقم".$bill->id;
        $entry->source = "/salebilldetail/".$bill->id;
        $entry->user_id = auth()->user()->id;
        $entry->save();

        //////////////////////// cus ///////////////////////////
        ///////// entry_id  -  tree_id  -  credit  دائن-  debit  مدين
        $this->set_entry($entry->id ,$cus->tree->id ,0 ,$request->final_total);
        //////////////////////// pursh ///////////////////////////////
        if($cus->type == 0)
            $this->set_entry($entry->id ,$this->sale_cash_tree ,$request->total_before_tax ,0);
        else
            $this->set_entry($entry->id ,$this->sale_forward_tree ,$request->total_before_tax ,0);
        ////////////////////////pursh tax ///////////////////////////
        $this->set_entry($entry->id ,$this->sale_tax_tree ,$request->total_tax ,0);

        if($request->paid_amount > 0 || $x > 0){
            $entry = new AccountingEntry();
            $entry->type = 1;
            $entry->title_en = "Pay sale invoice number".$bill->id;
            $entry->title_ar = "دفع فاتورة بيع رقم".$bill->id;
            $entry->date = date('Y-m-d');
            $entry->description = "دفع فاتورة بيع رقم".$bill->id;
            $entry->user_id = auth()->user()->id;
            $entry->save();

            //////////////////////// bank safe ///////////////////////////////
            $user = '';
            if($request->pay_way == 0){
                $user = User::where('id',auth()->user()->id)->with(['tree' => function($q) {$q->where('parent_id',$this->safe_tree); }])->first();
            }else{
                $user = User::where('id',auth()->user()->id)->with(['tree' => function($q) {$q->where('parent_id',$this->safe_tree); }])->first();
            }

            if($cus->type == 0){
                $this->set_entry($entry->id ,$cus->tree->id ,$request->final_total ,0);
                $this->set_entry($entry->id ,($user->tree)[0]->id ,0 ,$request->final_total);
            }
            else{
                $this->set_entry($entry->id ,$cus->tree->id ,$request->paid_amount ,0);
                $this->set_entry($entry->id ,($user->tree)[0]->id ,0 ,$request->paid_amount);
            }

        }

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect()->back()->with('id',$bill->id);
        //return redirect()->route('managebill');
    }

    public function bill_detail($id){
        $bill = SaleBill::with('user')->with('customer')->with('bill_items')->with('employee')->find($id);
        return view('admin.sale.salebilldetail',compact('bill'));
    }

    public function print_bill($id){
        $bill = SaleBill::with('user')->with('bill_items')->with('user')->find($id);
        return view('admin.sale.printsalebill',compact('bill'));
    }

    public function bil_pay_part(Request $request){
        //return $request->amount_val;
        $bill = SaleBill::find($request->bill_id);
        $payment = new SaleBillPayment();
        $payment->bill_id = $request->bill_id;
        $payment->user_id = auth()->user()->id;
        $payment->pay_way = $request->payment_type;
        $payment->remaining_amount = $bill->remaining_amount - $request->amount_val;
        if($request->payment_type == 0)
            $payment->cash = $request->amount_val;
        else
            $payment->visa = $request->amount_val;
        $payment->save();
        
        if($request->amount_val == $bill->remaining_amount){
            SaleBill::find($request->bill_id)->update(['is_paid'=>1 , 'remaining_amount' => 0]);
        }else{
            $remaining_amount = $bill->remaining_amount - $request->amount_val;
            SaleBill::find($request->bill_id)->update(['remaining_amount' => $remaining_amount]);
        }
        $cus = Customer::with('tree')->find($request->cus_id);

        $entry = new AccountingEntry();
        $entry->type = 1;
        $entry->title_en = "Pay sale invoice number".$bill->id;
        $entry->title_ar = "دفع فاتورة بيع رقم".$bill->id;
        $entry->date = date('Y-m-d');
        $entry->description = "دفع فاتورة بيع رقم".$bill->id;
        $entry->source = "/salebilldetail/".$bill->id;
        $entry->user_id = auth()->user()->id;
        $entry->save();
        
        //////////////////////// bank safe ///////////////////////////////
        $user = '';
        if($request->pay_way == 0){
            $user = User::where('id',auth()->user()->id)->with(['tree' => function($q) {$q->where('parent_id',$this->safe_tree); }])->first();
        }else{
            $user = User::where('id',auth()->user()->id)->with(['tree' => function($q) {$q->where('parent_id',$this->bank_tree); }])->first();
        }
        $this->set_entry($entry->id ,$cus->tree->id ,$request->amount_val ,0);
        $this->set_entry($entry->id ,($user->tree)[0]->id ,0 ,$request->amount_val);

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect()->back();

    }
////////////////////////// return bills ///////////////////////////////////
    
    public function return_bill_list(){
        return view('admin.sale.returnbill');
    }

    public function return_bill_page($id){
        $bill = SaleBill::with('user')->with('customer')->with('bill_items')->with('employee')->find($id);
        //return $bill;
        return view('admin.sale.returnbillaction',compact('bill')); 
    }

    public function return_bill(Request $request){
        //return $request;
        $bill = PurchaseBill::with('store')->find($request->bill_id);
        $cus = Customer::with('tree')->find($request->cus_id);
        $store = Store::with('tree')->find($bill->store_id);

        $return_bill = new ReturnSaleBill();
        $return_bill->return_number = 0;
        $return_bill->return_date = date('Y-m-d'); 
        $return_bill->bill_id = $request->bill_id;
        $return_bill->total_before_tax = $request->total_before_tax;
        $return_bill->total_tax = $request->total_tax;
        $return_bill->total_amount = $request->total_final;
        $return_bill->payment_status = $request->payment_status;
        if($cus->type == 1 )
            $return_bill->isClosed = 1;
        else if($cus->type == 0 && $request->total_final == $request->paid_amount)
            $return_bill->isClosed = 1;
        else
            $return_bill->isClosed = 0;
        $return_bill->user_id = auth()->user()->id;
        $return_bill->save();
        $return_bill->return_number = $return_bill->id;
        $return_bill->save();

        if($request->paid_amount > 0){
            $return_payment = new ReturnPurchaseBillPayment();
            $return_payment->return_id = $return_bill->id;
            $return_payment->paid_amount = $request->paid_amount;
            $return_payment->save();
        }

        foreach ($request->multi_product as $key => $value) {
            $return_product = new ReturnPurchaseProduct();
            $return_product->return_id = $return_bill->id;
            $return_product->bill_product_id = $value;
            $return_product->quantity = ($request->multi_quantity)[$key];
            $return_product->tax = ($request->multi_tax)[$key];
            $return_product->amount = ($request->multi_total)[$key];
            $return_product->save();

            $bill_product = PurchaseBillProduct::with('product_date')->find($value);
            $product_date = ProductDate::find($bill_product->product_id);
            $product_date->quantity = $product_date->quantity - ($request->multi_quantity)[$key];
            $product_date->save();
        }

        $entry = new AccountingEntry();
        $entry->type = 1;
        $entry->title_en = "Due return number ".$return_bill->id." for purchase invoice number".$request->bill_id;
        $entry->title_ar = "إستحقاق إرجاع رقم ".$return_bill->id." لفاتورة شراء رقم".$request->bill_id;
        $entry->date = date('Y-m-d');
        $entry->description = "إستحقاق إرجاع رقم ".$return_bill->id." لفاتورة شراء رقم".$request->bill_id;
        $entry->source = "/purchasereturnbilldetail/".$return_bill->id;
        $entry->user_id = auth()->user()->id;
        $entry->save();

        //////////////////////// supp ///////////////////////////
        $this->set_entry($entry->id ,$cus->tree->id ,0 ,$request->total_final);
        //////////////////////// pursh ///////////////////////////////
        $this->set_entry($entry->id ,$this->pursh_tree ,$request->total_before_tax ,0);
        ////////////////////////pursh tax ///////////////////////////
        $this->set_entry($entry->id ,$this->pursh_tax_tree ,$request->total_tax ,0);

        if($request->payment_status == 0 || $request->payment_status == 2){
            if($request->paid_amount > 0){
                $entry = new AccountingEntry();
                $entry->type = 1;
                $entry->title_en = "Pay return number ".$return_bill->id." for purchase invoice number".$request->bill_id;
                $entry->title_ar = "دفع الإرجاع رقم ".$return_bill->id." لفاتورة شراء رقم".$request->bill_id;
                $entry->date = date('Y-m-d');
                $entry->description = "دفع الإرجاع رقم ".$return_bill->id." لفاتورة شراء رقم".$request->bill_id;
                $entry->source = "/purchasereturnbilldetail/".$return_bill->id;
                $entry->user_id = auth()->user()->id;
                $entry->save();
                
                //////////////////////// bank safe ///////////////////////////////
                $user = User::where('id',auth()->user()->id)->with(['tree' => function($q) {$q->where('parent_id',$this->safe_tree); }])->first();
                $this->set_entry($entry->id ,$cus->tree->id ,$request->paid_amount ,0);
                $this->set_entry($entry->id ,($user->tree)[0]->id ,0 ,$request->paid_amount);
            }
        }

        $entry = new AccountingEntry();
        $entry->type = 1;
        $entry->title_en = "Cost of return number ".$return_bill->id." for purchase invoice number".$bill->id;
        $entry->title_ar = "تكلفة إرجاع رقم ".$return_bill->id." فاتورة شراء رقم".$bill->id;
        $entry->date = date('Y-m-d');
        $entry->description = "تكلفة إرجاع رقم ".$return_bill->id." فاتورة شراء رقم".$bill->id;
        $entry->source = "/purchasebilldetail/".$bill->id;
        $entry->user_id = auth()->user()->id;
        $entry->save();

        ////////////////////////cost ///////////////////////////
        $this->set_entry($entry->id ,$this->cost_sale_tree ,$request->total_final ,0);
        //////////////////////// store ///////////////////////////
        $this->set_entry($entry->id ,$store->tree->id ,0 ,$request->total_final);

        Session::flash('success', 'تمت العملية بنجاح!');
        return redirect()->route('purchasereturnbill');
    }

    public function return_bill_detail($id){
        $return_bill = ReturnPurchaseBill::with('user')->with('bill')->with('return_products')->with('return_payments')->find($id);
        //return $return_bill;
        return view('admin.purchase.purchasereturnbilldetail',compact('return_bill'));
    }


//////////////////////////// helper ////////////////////////////////////
    function set_entry($entry_id ,$tree_id ,$credit ,$debit){
        $account = TreeAccount::find($tree_id);
        if($account->balance_type == 0){
            $account->balance = $account->balance + $credit;
            $account->balance = $account->balance - $debit;
        }
        else{
            $account->balance = $account->balance - $credit;
            $account->balance = $account->balance + $debit;
        }
        $account->save();

        $action = new EntryAction();
        $action->entry_id = $entry_id;
        $action->tree_id = $tree_id;
        $action->credit = $credit;
        $action->debit = $debit;
        $action->balance = $account->balance;
        $action->save();
    }

    
}
