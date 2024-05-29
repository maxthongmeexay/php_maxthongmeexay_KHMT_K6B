<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    $html="<h1>welcome to Hanoi</h1>";
    return $html;
});
Route::get('/greeting', function () {
    
    return view('greeting',['name'=>'James']);
});
Route::get('/customer','App\Http\Controllers\CustomerController@index');
Route::get('/login','App\Http\Controllers\CustomerController@login');
Route::get('/getProducts','App\Http\Controllers\ProductsController@getProducts');
Route::get('/getProductsByBand','App\Http\Controllers\ProductsController@getProductsbyBand')->name('admin.product.getProductsByBand');
Route::get('updateProduct/{pid}','App\Http\Controllers\ProductsController@editProduct');
Route::post('updateProduct/{pid}','App\Http\Controllers\ProductsController@updateProduct');
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'product'],function(){});
Route::group(['prefix'=>'product'],function(){});
});