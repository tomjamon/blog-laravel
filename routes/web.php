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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', 'FrontController@index')->name('front.index');

/**
 * Routes pour les articles
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/article/{slug}', 'FrontController@article')->name('front.posts.show');

Route::get('/tag/{slug}', 'TagController@show')->name('front.tags.show');



Route::prefix('admin')->group(function() {
    Route::resource('posts', 'PostController');
});


