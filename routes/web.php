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

Route::get('/categories', function () {
    return view('categories');
});
Route::get('/search-results', function () {
    return view('search-results');
});

Route::get('/shortcodes', function () {
    return view('shortcodes');
});
Route::get('single-post-politics', function () {
    return view('single-post-politics');
});