<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('locale/{locale}', function ($locale){
	 App::setLocale($locale);
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::group(['middleware' => ['basic']],function () {
//--------------------------------------finance------------------------------


Route::get('/accountstree', 'FinancialController@display_account_tree')->name('accountstree');
Route::post('/add_new_accounttree', 'FinancialController@add_new_accounttree')->name('add_new_accounttree');


Route::get('dailyentrylist/{paginationVal}', 'FinancialController@show_all_entries')->name('dailyentrylist');
Route::get('dailyentry', 'FinancialController@add_entry_page');
Route::get('dailyentrydetail/{id}', 'FinancialController@entry_detail');
Route::get('printdailyentry/{id}', 'FinancialController@print_daily_entry')->name('printdailyentry');

Route::post('add_new_entry', 'FinancialController@add_new_entry')->name('add_new_entry');


Route::get('treasurybanklist', 'FinancialController@show_all_safes_banks')->name('treasurybanklist');
Route::get('addtreasurybank', 'FinancialController@add_safe_bank_page');
Route::post('add_new_safe_bank', 'FinancialController@add_new_safe_bank')->name('add_new_safe_bank');


//--------------------------------------sales------------------------------
Route::get('managebill/{paginationVal}','SalesController@show_all_bills')->name('managebill');

Route::get('addsalesbill','SalesController@add_bill_page');

Route::post('add_new_sale_bill','SalesController@add_new_sale_bill')->name('add_new_sale_bill');

Route::get('salebilldetail/{id}','SalesController@bill_detail')->name('salebilldetail');

Route::post('bil_pay_part','SalesController@bil_pay_part')->name('bil_pay_part');

Route::get('printsalebill/{id}', 'SalesController@print_bill');

Route::get('returnbilllist', 'SalesController@return_bill_list')->name('returnbilllist');

Route::get('returnbillaction/{id}', 'SalesController@return_bill_page')->name('returnbillaction');

Route::post('return_bill', 'SalesController@return_bill')->name('return_bill');

Route::get('returnbilldetail/{id}','SalesController@return_bill_detail');

Route::get('pointofsale','SalesController@sale_point_page');

Route::get('pricelist', function () {
    return view('admin/sale/pricelist');
});

Route::get('managepointofsale', function () {
    return view('admin/sale/managepointofsale');
});

Route::get('ajax_search_barcode/{barcode_val}','SalesController@ajax_search_barcode')->name('ajax_search_barcode');

//--------------------------------------purchase------------------------------
Route::get('purchasemanagebill/{paginationVal}', 'PurchasesController@show_all_bills')->name('purchasemanagebill');

Route::get('addpurchasebill','PurchasesController@show_bill_page');

Route::post('add_new_purch_bill','PurchasesController@add_new_purch_bill')->name('add_new_purch_bill');

Route::get('purchasebilldetail/{id}','PurchasesController@bill_detail');

Route::get('printpurchasebill/{id}', 'PurchasesController@print_bill');

Route::post('purchase_bil_pay_part','PurchasesController@bil_pay_part')->name('purchase_bil_pay_part');

Route::get('purchasereturnbill', 'PurchasesController@return_bill_list')->name('purchasereturnbill');

Route::get('purchasereturnbillaction/{id}', 'PurchasesController@return_bill_page')->name('purchasereturnbillaction');

Route::post('purchase_return_bill', 'PurchasesController@return_bill')->name('purchase_return_bill');

Route::get('purchasereturnbilldetail/{id}','PurchasesController@return_bill_detail');

Route::post('return_bil_pay_part','PurchasesController@return_bil_pay_part')->name('return_bil_pay_part');


Route::get('purchaserequest', function () {
    return view('admin/purchase/purchaserequest');
});

Route::get('ajax_search_barcode_purchase/{barcode_val}','PurchasesController@ajax_search_barcode')->name('ajax_search_barcode_purchase');

//--------------------------------------customerlist------------------------------
Route::get('customerlist', 'CustomerController@show_all_customers')->name('customerlist');

Route::get('addcustomer', 'CustomerController@add_customer_page')->name('addcustomer');

Route::post('add_new_customer', 'CustomerController@add_new_customer')->name('add_new_customer');

Route::get('customerdetail/{id}', 'CustomerController@show_customer_detail')->name('customerdetail');

Route::get('editcustomer/{id}', 'CustomerController@edit_customer_page')->name('editcustomer');
Route::post('edit_customer', 'CustomerController@edit_customer')->name('edit_customer');

Route::get('customer_activation/{id}/{status}', 'CustomerController@customer_activation')->name('customer_activation');

//--------------------------------------supplierlist------------------------------
Route::get('supplierlist', 'SupplierController@show_all_suppliers')->name('supplierlist');

Route::get('addsupplier', 'SupplierController@add_supplier_page')->name('addsupplier');

Route::post('add_new_supplier', 'SupplierController@add_new_supplier')->name('add_new_supplier');

Route::get('supplierdetail/{id}', 'SupplierController@show_supplier_detail')->name('supplierdetail');

Route::get('editsupplier/{id}', 'SupplierController@edit_supplier_page')->name('editsupplier');

Route::post('edit_supplier', 'SupplierController@edit_supplier')->name('edit_supplier');

Route::get('supplier_activation/{id}/{status}', 'SupplierController@supplier_activation')->name('supplier_activation');
//---------------------------------- product & service & store manage ---------------------------


        //////// store///////
Route::get('storemanage', 'StoreController@show_all_stores')->name('storemanage');

Route::get('addstore', 'StoreController@add_store_page')->name('addstore');

Route::post('add_new_store', 'StoreController@add_new_store')->name('add_new_store');

Route::get('storedetail/{id}', 'StoreController@show_store_detail')->name('storedetail');

Route::get('editstore/{id}', 'StoreController@edit_store_page')->name('editstore');

Route::post('edit_store', 'StoreController@edit_store')->name('edit_store');



           //---Items (products/services)---

/*Route::get('productservice', function () {
    return view('admin/store/productservice');
});

Route::get('addproduct', function () {
    return view('admin/store/addproduct');
});*/

Route::get('productservice/{paginationVal}', 'StoreController@show_all_products')->name('productservice');

Route::get('addproduct', 'StoreController@add_product_page')->name('addproduct');

Route::post('add_product', 'StoreController@add_new_product')->name('add_product');

Route::get('productdetail/{id}', 'StoreController@show_product_detail')->name('productdetail');

Route::get('editproduct/{id}', 'StoreController@edit_product_page')->name('editproduct');

Route::post('edit_product', 'StoreController@edit_product')->name('edit_product');



Route::post('add_new_stock', 'StoreController@add_new_stock')->name('add_new_stock');
Route::post('edit_stock', 'StoreController@edit_stock')->name('edit_stock');


Route::get('inventorylist', 'StoreController@show_inventory_products')->name('inventorylist');
    /////////////////// store settings ////////////////////////////
Route::get('storesetting', function () {
    return view('admin/store/storesetting');
});

/*Route::get('inventorylist', function () {
    return view('admin/store/inventorylist');
});*/



Route::get('productdefinition', 'StoreController@show_all_definitions')->name('productdefinition');
Route::post('add_new_category', 'StoreController@add_new_category')->name('add_new_category');
Route::post('add_new_type', 'StoreController@add_new_type')->name('add_new_type');

Route::get('barcodelist/{lang}', 'StoreController@barcode_list')->name('barcodelist');
Route::get('barcodesingle/{id}/{lang}', 'StoreController@barcode_single')->name('barcodesingle');

//--------------------------------------employee manage------------------------------
Route::get('manageemployee', 'EmployeeController@show_all_employee')->name('manageemployee');

Route::get('addemployee', 'EmployeeController@add_employee_page')->name('addemployee');

Route::post('add_new_employee', 'EmployeeController@add_new_employee')->name('add_new_employee');

Route::get('employeedetail/{id}', 'EmployeeController@show_employee_detail')->name('employeedetail');

Route::get('editemployee/{id}', 'EmployeeController@edit_employee_page')->name('editemployee');

Route::post('edit_employee', 'EmployeeController@edit_employee')->name('edit_employee');

Route::get('employee_activation/{id}/{status}', 'EmployeeController@employee_activation')->name('employee_activation');

        //////////////////////  org /////////////////////////////

Route::get('orgstructure', 'EmployeeController@show_all_org');
Route::post('add_new_department', 'EmployeeController@add_new_department')->name('add_new_department');
Route::post('add_new_job', 'EmployeeController@add_new_job')->name('add_new_job');
Route::get('department_activation/{id}/{status}', 'EmployeeController@department_activation');
Route::get('job_activation/{id}/{status}', 'EmployeeController@job_activation');


//--------------------------------------Insurance Company------------------------------

Route::get('insurancecompanylist', 'InsuranceCompanyController@show_all_companies')->name('insurancecompanylist');

Route::get('addinsurancecompany', 'InsuranceCompanyController@add_company_page')->name('addinsurancecompany');

Route::post('add_new_company', 'InsuranceCompanyController@add_new_company')->name('add_new_company');

Route::get('insurancecompanydetail/{id}', 'InsuranceCompanyController@show_company_detail')->name('insurancecompanydetail');

Route::post('add_new_class', 'InsuranceCompanyController@add_new_class')->name('add_new_class');

Route::post('edit_class', 'InsuranceCompanyController@edit_class')->name('edit_class');

Route::get('editcompany/{id}', 'InsuranceCompanyController@edit_company_page')->name('editcompany');

Route::post('edit_company', 'InsuranceCompanyController@edit_company')->name('edit_company');
/*
Route::get('employee_activation/{id}/{status}', 'InsuranceCompanyController@employee_activation')->name('employee_activation');*/



//--------------------------------------Branches------------------------------

Route::get('managebranch', 'BranchesController@show_all_branches')->name('managebranch');
Route::get('addbranch', 'BranchesController@add_branch_page')->name('add_branch_page');
Route::post('add_new_branch', 'BranchesController@add_new_branch')->name('add_new_branch');


//////////////////////////////// General Setting ////////////////////////////////////////

            //////////////////// Tax Setting ////////////////////

Route::get('taxsetting', 'GeneralSettingController@show_tax_setting_page')->name('taxsetting');
Route::post('update_tax', 'GeneralSettingController@update_tax')->name('update_tax');

////////////////////////////////// Manage Doctor //////////////////////////////

Route::get('doctorlist/{paginationVal}', 'ManageDoctorController@show_all_doctors')->name('doctorlist');
Route::get('adddoctor', 'ManageDoctorController@add_doctor_page')->name('adddoctor');
Route::post('add_new_doctor', 'ManageDoctorController@add_new_doctor')->name('add_new_doctor');
Route::get('doctordetail/{id}', 'ManageDoctorController@show_doctor_detail')->name('doctordetail');
Route::get('editdoctor/{id}', 'ManageDoctorController@edit_doctor_page')->name('editdoctor');
Route::post('edit_doctor', 'ManageDoctorController@edit_doctor')->name('edit_doctor');

Route::get('prescriptionlist/{paginationVal}', 'ManageDoctorController@show_all_prescription')->name('prescriptionlist');
Route::get('prescriptiondetail/{id}', 'ManageDoctorController@show_prescription_detail')->name('prescriptiondetail');

Route::get('printprescription/{id}', 'ManageDoctorController@print_prescription')->name('printprescription');

Route::get('prescriptionbill/{id}', 'ManageDoctorController@prescription_to_bill_page')->name('prescriptionbill');

Route::post('new_prescription_bill', 'ManageDoctorController@new_prescription_bill')->name('new_prescription_bill');

Route::get('prescriptionbilllist/{paginationVal}', 'ManageDoctorController@show_all_prescription_bill')->name('prescriptionbilllist');


});

//////////////////////////////////////// Doctor ///////////////////////////////////
Route::middleware(['doctor'])->group(function () {
    
    Route::get('/doctorprofile','HomeController@index')->name('doctorprofile');
    Route::post('edit_profile','DoctorController@edit_profile')->name('edit_profile');
    Route::post('edit_password','DoctorController@edit_password')->name('edit_password');

    Route::get('/medicaldesc/{paginationVal}','DoctorController@show_all_prescription')->name('medicaldesc');
    Route::get('/addmedicaldes', 'DoctorController@add_prescription_page')->name('addmedicaldes');
    Route::get('/productsearch/{search_val}', 'DoctorController@ajax_search')->name('productsearch');
    Route::post('add_new_prescription', 'DoctorController@add_new_prescription')->name('add_new_prescription');
    Route::get('medicaldescdetail/{id}', 'DoctorController@show_prescription_detail')->name('medicaldescdetail');

    Route::get('ajax_get/{id}', 'DoctorController@ajax_get')->name('ajax_get');

    
    
});