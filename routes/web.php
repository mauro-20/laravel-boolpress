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

// Public routes
Route::get('/', 'PageController@index')->name('homepage');
Route::get('/blog', 'PostController@index')->name('blog.index');
Route::get('/blog/{slug}', 'PostController@show')->name('post.show');

// Authentication routes
Auth::routes();

// Admin area routes
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
    });

