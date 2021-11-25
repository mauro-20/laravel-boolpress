<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');
Route::get('/tag/{slug}', 'TagController@show')->name('tag.show');
Route::get('/api-posts', 'PageController@apiPosts')->name('api.posts');

// Authentication routes
Auth::routes();

// Admin area routes
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
});

