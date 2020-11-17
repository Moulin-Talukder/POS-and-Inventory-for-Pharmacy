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

Route::get('/inbox', function(){
	echo "inbox";
})->name('inbox');

Route::get('/calender', function(){
	echo "calender";
})->name('calender');

Route::get('/typography', function(){
	echo "typography";
})->name('typography');

Route::get('/product','ProductController@Index')->name('product');

Route::post('/product/create','ProductController@createProduct')->name('product.create');
