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
Route::get('/product','ProductController@Index')->name('product');
Route::post('/product/create','ProductController@createProduct')->name('product.create');

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