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
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'PostController@index')->name('home');

    Route::get('/postcreate', [
        'uses' => 'PostController@create',
        'as' => 'post.create',
        'middleware' => 'auth'
    ]);

    Route::post('/poststore', [
        'uses' => 'PostController@store',
        'as' => 'post.store',
        'middleware' => 'auth'
    ]);


    Route::post('/comment/store', [
       'uses' => 'CommentController@store',
       'as' => 'comment.store',
       'middleware' => 'auth'
    ]);
//
//    Route::resource('posts', 'PostController');

    Route::resource('post.comment', 'CommentController');




});
