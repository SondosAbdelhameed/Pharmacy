<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Models\Customer;
use App\Models\CustomerCompanyInfo;
use App\Models\TreeAccount;
use App\Models\InsuranceCustomer;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyClass;

class CustomerController extends Controller
{

  private $indiv_tree_id = 58;
  private $comp_tree_id = 59;

  public function __construct(){
    $this->middleware('auth');
  }

  public function show_all_customers(){
    $customers = Customer::with('user')->with('tree')->with('activation')->get();
    //return $customers;
    return view('admin.customer.customerlist',compact('customers'));
  }

  public function add_customer_page(){
    $insurance = InsuranceCompany::with('classes')->get();
    return view('admin.customer.addcustomer',compact('insurance'));
  }

  public function add_new_customer(Request $request){
    
    if($request->cus_type == 1){
      $this->validate($request, [
        'com_name_en' => 'required',
        'com_name_ar' => 'required',
        'com_credit_limit' => 'required',
        'com_credit_duration' => 'required',
        'com_current_balance' => 'required'
      ]);
    }
    if($request->cus_type == 0)
      $acc = TreeAccount::where('id',$this->indiv_tree_id)->with('account')->first();
    else
      $acc = TreeAccount::where('id',$this->comp_tree_id)->with('account')->first();
    $code = ($acc->id_code.'0000')+count($acc->account)+1;
    //return $code;

    $customer = new Customer();
    $customer->name_en = $request->cus_name_en;
    $customer->name_ar = $request->cus_name_ar;
    $customer->phone = $request->cus_phone;
    $customer->email = $request->cus_email;
    $customer->city = $request->cus_city;
    $customer->area = $request->cus_area;
    $customer->address = $request->cus_address;
    $customer->type = $request->cus_type;
    $customer->user_id = auth()->user()->id;
    $customer->save();

    $account = new TreeAccount;
    $account->name_ar = $request->cus_name_ar;
    $account->name_en = $request->cus_name_en;
    $account->account_type = 1;
    if($request->cus_type == 0)
      $account->parent_id = $this->indiv_tree_id;
    else
      $account->parent_id = $this->comp_tree_id;
    $account->balance_type = 1;
    $account->user_id = auth()->user()->id;
    $account->final_account_id = 1;
    $account->id_code = $code;
    $customer->tree()->save($account);

    if($request->cus_type == 1){
      $company = new CustomerCompanyInfo();
      $company->customer_id = $customer->id;
      $company->company_name_en = $request->com_name_en;
      $company->company_name_ar = $request->com_name_ar;
      $company->credit_limit = $request->com_credit_limit;
      $company->credit_duration = $request->com_credit_duration;
      $company->current_balance = $request->com_current_balance;
      $company->save();
    }

    if(isset($request->insurance_val) && $request->insurance_val == 1){
      $insurance = new InsuranceCustomer();
      $insurance->customer_id = $customer->id;
      $insurance->insurance_class_id = $request->class_id;
      $insurance->card_number = $request->card_number;
      $insurance->expire_date = $request->expire_date;
      $insurance->save();
    }
    Session::flash('success', 'تمت العملية بنجاح!');
    return redirect()->route('customerlist');
  }

  public function show_customer_detail($id){
    $cusdetail = Customer::where('id',$id)->with('company')->with('insurance_class')->first();
    return view('admin.customer.customerdetail', compact('cusdetail'));
  }

  public function edit_customer_page($id){
    $cusdetail = Customer::where('id',$id)->with('company')->first();
    return view('admin.customer.editcustomer',compact('id', 'cusdetail'));
  }

  public function edit_customer(Request $request){
    //return $request;
      $customer = Customer::find($request->cus_id);
      $customer->name_en = $request->cus_name_en;
      $customer->name_ar = $request->cus_name_ar;
      $customer->phone = $request->cus_phone;
      $customer->email = $request->cus_email;
      $customer->city = $request->cus_city;
      $customer->area = $request->cus_area;
      $customer->address = $request->cus_address;
      $customer->save();
      if($customer->type == 1){
        $company = CustomerCompanyInfo::where('customer_id',$request->cus_id)->first();
        $company->company_name_en = $request->com_name_en;
        $company->company_name_ar = $request->com_name_ar;
        $company->credit_limit = $request->com_credit_limit;
        $company->credit_duration = $request->com_credit_duration;
        $company->current_balance = $request->com_current_balance;
        $company->save();
      }
      Session::flash('success', 'تمت العملية بنجاح!');
      return redirect()->route('customerdetail',['id' => $request->cus_id]);
  }

  public function customer_activation($id , $status){
    Customer::find($id)->update(['isActive' => $status]);
    Session::flash('success', 'تمت العملية بنجاح!');
    return redirect()->back();
  }
}
