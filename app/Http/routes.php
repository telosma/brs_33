<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function() {
        return view('admin.home');
    });
});

Route::group(['middleware' => ['web']], function() {
    Route::get('signup', [
        'uses' => 'AuthUserController@getSignup',
        'as' => 'getSignup'
    ]);

    Route::get('signin', [
        'uses' => 'AuthUserController@getSignin',
        'as' => 'getSignin'
    ]);

    Route::group(['middleware' => 'auth', 'prefix' => 'user'], function() {
        Route::get('signout', [
            'uses' => 'AuthUserController@getSignout',
            'as' => 'signout'
        ]);
    });

    Route::post('signup', [
        'uses' => 'AuthUserController@postSignup',
        'as' => 'signup'
    ]);

    Route::post('signin', [
        'uses' => 'AuthUserController@postSignin',
        'as' => 'signin'
    ]);
});
