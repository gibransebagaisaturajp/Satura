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

// Route::resource('categories', 'CategoryAPIController', [
//     'only' => ['index', 'show', 'store', 'update', 'destroy']
// ]);

// Route::resource('articles', 'ArticleAPIController', [
//     'only' => ['index', 'show', 'store', 'update', 'destroy']
// ]);

// Route::resource('users', 'UserAPIController', [
//     'only' => ['index', 'show', 'store', 'update', 'destroy']
// ]);

// // Frontend
// Route::resource('front', 'FrontendAPIController');

Route::resource('siswa', 'Api\SiswaController');
Route::resource('kategori', 'Api\KategoriController');
Route::resource('artikel', 'Api\ArtikelController');
Route::resource('tag', 'Api\TagController');