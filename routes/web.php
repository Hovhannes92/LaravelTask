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

    Route::group(['middleware' => ['auth']], function () {

        // @TODO post as resource controller ... done
        Route::resource('posts', 'PostController');

        //@TODO except not used routes  ...done
        Route::resource('post.comment', 'CommentController')->only('store')->middleware('auth');

    });

});

