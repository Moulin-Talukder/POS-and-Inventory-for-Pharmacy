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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//PRODUCT ROUTES ARE HERE
Route::get('/add-product', 'ProductController@AddProduct')->name('add.product');
Route::post('/insert-product', 'ProductController@InsertProduct')->name('insert.product');
Route::get('/all-product', 'ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@DeleteProduct');
Route::get('/edit-product/{id}', 'ProductController@EditProduct');
Route::post('/update-product/{id}', 'ProductController@UpdateProduct');
Route::get('/view-product/{id}', 'ProductController@ViewProduct');


//EMPLOYEE ROUTES ARE HERE
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee', 'EmployeeController@store')->name('insert.employee');
Route::get('/all-employee', 'EmployeeController@employees')->name('all.employee');
Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
Route::post('/update-employee/{id}', 'EmployeeController@UpdateEmployee');

//CUSTOMER ROUTES ARE HERE
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@store')->name('insert.customer');
Route::get('/all-customer', 'CustomerController@AllCustomer')->name('all.customer');
Route::get('/delete-customer/{id}', 'CustomerController@DeleteCustomer');
Route::get('/edit-customer/{id}', 'CustomerController@EditCustomer');
Route::post('/update-customer/{id}', 'CustomerController@UpdateCustomer');
Route::get('/view-customer/{id}', 'CustomerController@ViewCustomer');

//SUPPLIER ROUTES ARE HERE
Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier', 'SupplierController@store')->name('insert.supplier');
Route::get('/all-supplier', 'SupplierController@AllSupplier')->name('all.supplier');
Route::get('/edit-supplier/{id}', 'SupplierController@EditSupplier');
Route::post('/update-supplier/{id}', 'SupplierController@UpdateSupplier');
Route::get('/view-supplier/{id}', 'SupplierController@ViewSupplier');
Route::get('/delete-supplier/{id}', 'SupplierController@DeleteSupplier');

//SALARY ROUTES ARE HERE
Route::get('/add-advanced-salary', 'SalaryController@AddAdvancedSalary')->name('add.advancedsalary');
Route::post('/insert-advancedsalary', 'SalaryController@InsertAdvanced')->name('insert.advancedsalary');
Route::get('/all-advanced-salary', 'SalaryController@AllSalary')->name('all.advancedsalary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');


//CATEGORY ROUTES ARE HERE
Route::get('/add-category', 'CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category', 'CategoryController@InsertCategory')->name('insert.category');
Route::get('/all-category', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}', 'CategoryController@UpdateCategory');

//EXPENSE ROUTES ARE HERE
Route::get('/add-expense', 'ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@InsertExpense')->name('insert.expense');
Route::get('/today-expense', 'ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-today-expense/{id}', 'ExpenseController@UpdateTodayExpense');
Route::get('/monthly-expense', 'ExpenseController@MonthlyExpense')->name('monthly.expense');

