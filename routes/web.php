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

//use App\Http\Controllers\ProductController;
//use Illuminate\Support\Facades\Route;

Route::get('/','ProductController@index');
Route::post('products','ProductController@store')->name('products.store');
Route::delete('products/{product}','ProductController@destroy')->name('products.destroy');
