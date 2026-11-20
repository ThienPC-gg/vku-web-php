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

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/product', function () {
    return view('pages.product');
});

Route::get('/news', function () {
    return view('pages.news');
});

Route::get('/contact', function () {
    return view('pages.contact');
});
