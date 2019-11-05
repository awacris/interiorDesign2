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
})->name('home');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/user', function () {
    return view('welcome');
})->name('user');



Route::get('/home', 'HomeController@index')->name('user-home');
Route::get('/product/{id}', 'HomeController@show')->name('product-detail');

Route::get('{any}', function () {
    return view('admin');
})->where('any','.*');