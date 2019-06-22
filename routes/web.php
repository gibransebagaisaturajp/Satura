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

Route::get('/home', 'HomeController@index')->name('home');



Route::get('welcome', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return view('backend');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/portfolio', function () {
    return view('portfolio');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/elements', function () {
    return view('elements');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/causes', function () {
    return view('contact');
});
