<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// table home

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('loaibs/{id}', 'HomeController@loaibosat')->name('loaibs');
Route::get('loaign/{id}', 'HomeController@loaigamnham')->name('loaign');
Route::get('loaipk/{id}', 'HomeController@loaiphukien')->name('loaipk');
Route::get('chitiet/{id}', 'HomeController@chitiet')->name('ct');

// table cart

Route::get('/cart-shopping', 'CartController@scart')->name('cart.shopping');
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
Route::post('remove/{id}', 'CartController@remove')->name('remove');
Route::post('/cart/update' ,'CartController@update')->name('cart.update');
Route::post('/store' ,'CartController@store')->name('cart.store');
//table mail
Route::get('/send-mail','CartController@send_mail');


//table product

Route::group(['prefix' => 'product'], function () {
Route::get('/show/{id}',"ProductController@show")->name('product.show');
Route::get('/',"ProductController@index")->name('product.index');
Route::get('/create','ProductController@create')->name('product.create');
Route::post('/post','ProductController@store')->name('product.store');
Route::get('/{id}','ProductController@edit')->name('product.edit');
Route::put('/{id}','ProductController@update')->name('product.update');

});


Route::resource('customer', 'CustomerController');

//table admin

Route::view('admin','admin.partials.dashboard');

Route::view('modal','admin.customer.index');
