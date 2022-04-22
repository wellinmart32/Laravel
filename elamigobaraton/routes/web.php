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
    return view('welcome');
});

Auth::routes();

Route::resource('/products', 'ProductController');

Route::get('/productfilter', 'ProductController@filter')->name('productfilter');

Route::post('/productsearch', 'ProductController@search')->name('productsearch');

Route::resource('/sales', 'SaleController');

Route::get('/salefilter', 'SaleController@filter')->name('salefilter');

Route::post('/salesearch', 'SaleController@search')->name('salesearch');

Route::get('/product/{id}', 'SaleController@getProductInfo');

Route::get('/home', 'HomeController@index')->name('home');
