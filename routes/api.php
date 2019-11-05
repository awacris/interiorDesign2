<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/category', 'CategoryController@store');

Route::get('/category', 'CategoryController@get');

Route::delete('/category/{id}', 'CategoryController@destroy');


Route::post('/option', 'OptionController@store');

Route::get('/option', 'OptionController@get');

Route::delete('/option/{id}', 'OptionController@destroy');

Route::post('/option-value', 'ValueController@store');

Route::get('/option-value', 'ValueController@get');

Route::delete('/option-value/{id}', 'ValueController@destroy');

Route::post('/product', 'ProductController@store');

Route::get('/product', 'ProductController@get');

Route::delete('/product/{id}', 'ProductController@destroy');

Route::post('/product-option', 'ProductController@option_store');

Route::get('/product-option', 'ProductController@option_get');

Route::delete('/product-option/{id1}', 'ProductController@option_destroy');

Route::post('/product-combination', 'ProductController@combination_store');

Route::get('/product-combination', 'ProductController@combination_get');

Route::delete('/product-combination/{id}', 'ProductController@combination_destroy');

Route::get('/product-combination-value/{id}', 'ProductController@combination_values_get');
