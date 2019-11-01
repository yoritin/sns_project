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

Auth::routes();

// posts
Route::get('/', 'PostsController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create', 'PostsController@create');
    Route::post('/', 'PostsController@store');
});

// users
Route::resource('users', 'UsersController');

// relationship
Route::post('/relationship', 'RelationshipsController@store');
