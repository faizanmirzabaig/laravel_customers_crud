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
Route::get('/', 'CustomerController@welcome');
Route::post('/products/import', 'CustomerController@import_excel')->name('customers.import');
Route::prefix('/manage-customers')->group(function () {
    Route::get('/index', 'CustomerController@index')->name('customers.index');
    Route::get('/create','CustomerController@create')->name('customers.create');
    Route::get('/edit/{slug}','CustomerController@edit')->name('customers.edit');
    Route::post('/store','CustomerController@store')->name('customer.store');
    Route::post('/update/{slug}','CustomerController@update')->name('customer.update');
    Route::post('/delete','CustomerController@delete')->name('customer.delete');

});

