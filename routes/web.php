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


// home page
Route::get('/', 'Site\HomeController@index');

// post
Route::resource('/post', 'Site\PostController');

// category
Route::resource('/category', 'Site\CategoryController');

// comments
Route::resource('/comment', 'Site\CommentController');

// tag
Route::resource('/tag', 'Site\TagController');

// filter Tag
Route::get('/filter/{tag}', 'Site\PostController@filterTag');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
