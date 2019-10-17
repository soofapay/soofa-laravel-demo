<?php

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
    return view('demo.products');
})->name('home');

Route::post('/addCart', 'QubeansController@addToCart')->name('cart.product');
Route::get('/showCart','QubeansController@cart')->name('cart.index');
Route::post('/remove/{product}','QubeansController@remove')->name('remove.cart');
Route::post('/qubeans','QubeansController@find')->name('qubeans.checkout');
Route::post('/webhook','QubeansController@webhook')->name('qubeans.webhook');