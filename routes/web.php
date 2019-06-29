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


// Route::get('/admin', function () {
//     return view('back');
// });

//Route Halaman Backend
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/', function () {
        return view('adminbackend');
    });
    
    
});

Route::resource('kategori', 'KategoriController');
Route::resource('tag', 'TagController');
Route::resource('artikel', 'ArtikelController');


Route::get('dashboardfrontend', function () {
    return view('dashboardfrontend');
});




Route::get('welcome', function () {
    return view('welcome');
});
// Route::get('admin', function () {
//     return view('backend');
// });

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
Route::get('/single-post', function () {
    return view('single-post');
});
Route::get('/single-post-politics', function () {
    return view('single-post-politics');
});
Route::get('/single-post-fashion', function () {
    return view('single-post-fashion');
});
Route::get('/single-post-videos', function () {
    return view('single-post-videos');
});
Route::get('/single-post-games', function () {
    return view('single-post-games');
});
Route::get('/single-post-music', function () {
    return view('single-post-music');
});
Route::get('/index-politics', function () {
    return view('index-politics');
});
Route::get('/index-games', function () {
    return view('index-games');
});
Route::get('/index-videos', function () {
    return view('index-videos');
});
Route::get('/index-music', function () {
    return view('index-music');
});
Route::get('/index-fashion', function () {
    return view('index-fashion');
});


// Route::get('index-videos', function () {
//     return view('index-videos');
// });
// Route::get('index-videos', function () {
//     return view('index-videos');
// });