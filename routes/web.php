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



Route::get('/', [App\Http\Controllers\ProductController::class, 'list']);
Route::get('fetchproducts', [App\Http\Controllers\ProductController::class, 'fetch']);

Route::get('product/{id}', [App\Http\Controllers\ProductController::class, 'showo']);
Route::get('login', 'CustomerController@showLoginForm')->name('login');
Route::post('login', 'CustomerController@doLogin');
Route::post('ajaxadd', 'CartController@ajaxAdd');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('success', 'CartController@success')->name('success');
Route::get('checkout', 'CartController@checkout')->name('cart');
Route::post('checkout', 'CartController@doCheckout');
Route::get('register', 'CustomerController@showRegisterForm')->name('register');
Route::post('register', 'CustomerController@createCustomer');
    Route::get('logout', 'CustomerController@logout')->name('logout');