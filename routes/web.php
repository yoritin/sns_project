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
Route::get('/users/1/edit', 'PostsController@testuser');

// posts
Route::get('/', 'PostsController@index');
Route::get('/posts/new-info', 'PostsController@newInfo');
Route::get('/post/{post}/edit', 'PostsController@edit');
Route::patch('/', 'PostsController@update');



Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create', 'PostsController@create');
    Route::post('/', 'PostsController@store');
    // posts delete
    Route::delete('/posts/{post}', 'PostsController@destroy');
    // profile
    Route::patch('/profile', 'UsersController@updateProfile');
    // like
    Route::post('/likes', 'LikesController@store');
    Route::delete('/likes', 'LikesController@destroy');
    // comments
    Route::post('/comments', 'CommentsController@store');
    // relationship
    Route::post('/relationship', 'RelationshipsController@store');
    Route::delete('/relationship', 'RelationshipsController@destroy');
});


// users
Route::resource('users', 'UsersController');

