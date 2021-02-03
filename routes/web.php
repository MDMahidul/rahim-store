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
    return view('home');
});

Route::get('/addProductPage', function () {
    return view('addingProducts');
});

Route::get('/getProducts','HomeController@getProducts');
Route::post('/addProducts','HomeController@addProducts');
Route::post('/ProductDelete','HomeController@ProductDelete');
Route::post('/ProductDetails','HomeController@ProductDetails');
Route::post('/ProductsUpdate','HomeController@ProductsUpdate');
