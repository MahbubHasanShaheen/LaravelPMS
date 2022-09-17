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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/', function () {
    return redirect('login');
});



Route::group(['middleware'=>'auth'], function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);

        // Employee Route............
        Route::get('employee/add-employee', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('add.employee');
        Route::post('employee/employee-store',[App\Http\Controllers\EmployeeController::class,'store']);
        Route::get('employee/all-employee', [App\Http\Controllers\EmployeeController::class, 'allEmployee'])->name('all.employee');
        Route::get('employee/delete/{id}',[App\Http\Controllers\EmployeeController::class,'deleteEmployee']);
        Route::get('employee/view-employee/{id}',[App\Http\Controllers\EmployeeController::class,'viewEmployee']);
        Route::get('employee/edit-employee/{id}',[App\Http\Controllers\EmployeeController::class,'editEmployee']);
        Route::post('employee/update/{id}',[App\Http\Controllers\EmployeeController::class,'updateEmployee']);
        

        //--------Customer Route------------
        Route::get('customer/add-customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('add.customer');
        Route::post('customer/customer-store',[App\Http\Controllers\CustomerController::class,'store']);
        Route::get('customer/all-customer', [App\Http\Controllers\CustomerController::class, 'allCustomer'])->name('all.customer');
        Route::get('customer/view-customer/{id}',[App\Http\Controllers\CustomerController::class,'viewCustomer']);
        Route::get('customer/edit-customer/{id}',[App\Http\Controllers\CustomerController::class,'editCustomer']);
        Route::post('customer/update/{id}',[App\Http\Controllers\CustomerController::class,'updateCustomer']);
        Route::get('customer/delete/{id}',[App\Http\Controllers\CustomerController::class,'deleteCustomer']);


   
        //--------Customer Route------------
        Route::get('supplier/add-supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('add.supplier');
        Route::post('supplier/supplier-store',[App\Http\Controllers\SupplierController::class,'store']);
        Route::get('supplier/all-supplier', [App\Http\Controllers\SupplierController::class, 'allSupplier'])->name('all.supplier');
        Route::get('supplier/view-supplier/{id}',[App\Http\Controllers\SupplierController::class,'viewSupplier']);
        Route::get('supplier/edit-supplier/{id}',[App\Http\Controllers\SupplierController::class,'editSupplier']);
        Route::post('supplier/update/{id}',[App\Http\Controllers\SupplierController::class,'updateSupplier']);
        Route::get('supplier/delete/{id}',[App\Http\Controllers\SupplierController::class,'deleteSupplier']);




         //--------Salary Route------------
        Route::get('salary/add-advanced-salary', [App\Http\Controllers\SalaryController::class, 'addAdvancedSalary'])->name('add.advanced.salary');
        Route::post('salary/advancedsalary-store',[App\Http\Controllers\SalaryController::class,'storeAdvancedSalary']);
        Route::get('salary/all-advanced-salary', [App\Http\Controllers\SalaryController::class, 'allAdvancedSalary'])->name('all.advanced.salary');
        Route::get('salary/pay-salary', [App\Http\Controllers\SalaryController::class, 'paySalary'])->name('pay.salary');
        Route::get('salary/lastmonth-salary', [App\Http\Controllers\SalaryController::class, 'lastmonthSalary'])->name('lastmonth.salary');

         


                 //--------Category Route------------
        Route::get('category/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('add.category');
        Route::post('category/category-store',[App\Http\Controllers\CategoryController::class,'storeCategory']);
        Route::get('category/all-category', [App\Http\Controllers\CategoryController::class, 'allCategory'])->name('all.category');
       // Route::get('customer/view-customer/{id}',[App\Http\Controllers\CustomerController::class,'viewCustomer']);
        Route::get('category/edit-category/{id}',[App\Http\Controllers\CategoryController::class,'editCategory']);
        Route::post('category/update/{id}',[App\Http\Controllers\CategoryController::class,'updateCategory']);
        Route::get('category/delete/{id}',[App\Http\Controllers\CategoryController::class,'deleteCategory']);



                 //--------Product Route------------
        Route::get('product/add-product', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add.product');
        Route::post('product/product-store',[App\Http\Controllers\ProductController::class,'storeProduct']);
        Route::get('product/all-product', [App\Http\Controllers\ProductController::class, 'allProduct'])->name('all.product');
        Route::get('product/view-product/{id}',[App\Http\Controllers\ProductController::class,'viewProduct']);
        Route::get('product/edit-product/{id}',[App\Http\Controllers\ProductController::class,'editProduct']);
        Route::post('product/update/{id}',[App\Http\Controllers\ProductController::class,'updateProduct']);
        Route::get('product/delete/{id}',[App\Http\Controllers\ProductController::class,'deleteProduct']);
        Route::get('product/inactive/{id}',[App\Http\Controllers\ProductController::class,'inactiveProduct']);
        Route::get('product/active/{id}',[App\Http\Controllers\ProductController::class,'activeProduct']);

        // import/export produxt exel
         Route::get('product/import-product', [App\Http\Controllers\ProductController::class, 'importProduct'])->name('import.product');
         Route::get('product/export',[App\Http\Controllers\ProductController::class,'export'])->name('export');



        //-------------Spend Route---------------//
        Route::get('spend/add-spend', [App\Http\Controllers\SpendController::class, 'addSpend'])->name('add.spend');
        Route::post('spend/spend-store',[App\Http\Controllers\SpendController::class,'storeSpend']);
        Route::get('spend/all-spend', [App\Http\Controllers\SpendController::class, 'allSpend'])->name('all.spend');
        //----------Today Spend-------------------------//
        Route::get('spend/today-spend', [App\Http\Controllers\SpendController::class, 'TodaySpend'])->name('today.spend');
        Route::get('spend/edit-today-spend/{id}',[App\Http\Controllers\SpendController::class,'editTodaySpend']);
        Route::post('spend/today-update/{id}',[App\Http\Controllers\SpendController::class,'updateTodaySpend']);
         // -------------Month Spend-----------------//
        Route::get('spend/month-spend', [App\Http\Controllers\SpendController::class, 'MonthSpend'])->name('month.spend');
        Route::get('spend/edit-month-spend/{id}',[App\Http\Controllers\SpendController::class,'editMonthSpend']);
        Route::post('spend/month-update/{id}',[App\Http\Controllers\SpendController::class,'updateMonthSpend']);
        //----Year Spend-----------//
        Route::get('spend/year-spend', [App\Http\Controllers\SpendController::class, 'YearSpend'])->name('year.spend');
        Route::get('spend/edit-year-spend/{id}',[App\Http\Controllers\SpendController::class,'editYearSpend']);
        Route::post('spend/year-update/{id}',[App\Http\Controllers\SpendController::class,'updateYearSpend']);
        // ----------All Month-----------
        Route::get('spend/january-spend', [App\Http\Controllers\SpendController::class, 'JanuarySpend'])->name('january.spend');
        Route::get('spend/february-spend', [App\Http\Controllers\SpendController::class, 'FebruarySpend'])->name('february.spend');
        Route::get('spend/march-spend', [App\Http\Controllers\SpendController::class, 'MarchSpend'])->name('march.spend');
        Route::get('spend/april-spend', [App\Http\Controllers\SpendController::class, 'AprilSpend'])->name('april.spend');
        Route::get('spend/may-spend', [App\Http\Controllers\SpendController::class, 'MaySpend'])->name('may.spend');
        Route::get('spend/june-spend', [App\Http\Controllers\SpendController::class, 'JuneSpend'])->name('june.spend');
        Route::get('spend/july-spend', [App\Http\Controllers\SpendController::class, 'JulySpend'])->name('july.spend');
        Route::get('spend/august-spend', [App\Http\Controllers\SpendController::class, 'AugustSpend'])->name('august.spend');
        Route::get('spend/septembar-spend', [App\Http\Controllers\SpendController::class, 'SeptembarSpend'])->name('septembar.spend');
        Route::get('spend/october-spend', [App\Http\Controllers\SpendController::class, 'OctoberSpend'])->name('october.spend');
        Route::get('spend/novembar-spend', [App\Http\Controllers\SpendController::class, 'NovembarSpend'])->name('novembar.spend');
        Route::get('spend/december-spend', [App\Http\Controllers\SpendController::class, 'DecemberSpend'])->name('december.spend');


           //------------Attendences---------------//
        Route::get('attendence/take-attendence', [App\Http\Controllers\AttendenceController::class, 'takeAttendence'])->name('take.attendence');
        Route::post('attendence/insert-attendence', [App\Http\Controllers\AttendenceController::class, 'insertAttendence']);
        Route::get('attendence/all-attendence', [App\Http\Controllers\AttendenceController::class, 'allAttendence'])->name('all.attendence');
        Route::get('attendence/edit-attendence/{edit_date}',[App\Http\Controllers\AttendenceController::class,'editAttendence']);
        Route::post('attendence/update-attendence', [App\Http\Controllers\AttendenceController::class, 'updateAttendence']);
        Route::get('attendence/view-attendence/{edit_date}', [App\Http\Controllers\AttendenceController::class,'viewAttendence']);




        //monthly-------------------

        Route::get('attendence/monthly-attendence', [App\Http\Controllers\AttendenceController::class, 'monthlyAttendence'])->name('monthly.attendence');
        
       Route::get('attendence/january-attendence', [App\Http\Controllers\AttendenceController::class, 'januaryAttendence'])->name('january.attendence');

              
        Route::get('attendence/february-attendence', [App\Http\Controllers\AttendenceController::class, 'februaryAttendence'])->name('february.attendence');

        Route::get('attendence/march-attendence', [App\Http\Controllers\AttendenceController::class, 'marchAttendence'])->name('march.attendence');

        Route::get('attendence/april-attendence', [App\Http\Controllers\AttendenceController::class, 'aprilAttendence'])->name('april.attendence');

        Route::get('attendence/may-attendence', [App\Http\Controllers\AttendenceController::class, 'mayAttendence'])->name('may.attendence');

        Route::get('attendence/june-attendence', [App\Http\Controllers\AttendenceController::class, 'juneAttendence'])->name('june.attendence');

        Route::get('attendence/july-attendence', [App\Http\Controllers\AttendenceController::class, 'julyAttendence'])->name('july.attendence');

        Route::get('attendence/august-attendence', [App\Http\Controllers\AttendenceController::class, 'augustAttendence'])->name('august.attendence');

        Route::get('attendence/september-attendence', [App\Http\Controllers\AttendenceController::class, 'septemberAttendence'])->name('september.attendence');
    
       Route::get('attendence/octobar-attendence', [App\Http\Controllers\AttendenceController::class, 'octobarAttendence'])->name('octobar.attendence');

       Route::get('attendence/novembar-attendence', [App\Http\Controllers\AttendenceController::class, 'novembarAttendence'])->name('novembar.attendence');

       Route::get('attendence/decembar-attendence', [App\Http\Controllers\AttendenceController::class, 'decembarAttendence'])->name('decembar.attendence');

           
       Route::get('attendence/delete/{emp_id}',[App\Http\Controllers\AttendenceController::class,'deleteAttendence']);



       // Settimg Route-----------------------//
     Route::get('setting/all-setting', [App\Http\Controllers\SettingController::class, 'allSetting'])->name('all.setting');

    Route::get('setting/add-setting', [App\Http\Controllers\SettingController::class, 'addSetting'])->name('add.setting');
   Route::post('setting/store',[App\Http\Controllers\SettingController::class,'store']);
   Route::get('setting/edit-setting/{id}',[App\Http\Controllers\SettingController::class,'editSetting']);
   Route::post('setting/update/{id}',[App\Http\Controllers\SettingController::class,'updateSetting']);
   Route::get('setting/view-setting/{id}',[App\Http\Controllers\SettingController::class,'viewSetting']);




});












