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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'admin.home',
    ]);
    Route::resource('category', 'CategoryController', [
        'only' => [
            'create',
            'store',
            'index',
        ],
    ]);
    Route::group(['prefix' => 'category/ajax'], function() {
        Route::get('list', ['uses' => 'CategoryController@ajaxList', 'as' => 'admin.category.ajaxList']);
        Route::delete('delete', ['uses' => 'CategoryController@ajaxDelete', 'as' => 'admin.category.ajaxDelete']);
        Route::post('update', ['uses' => 'CategoryController@ajaxUpdate', 'as' => 'admin.category.ajaxUpdate']);
    });
    Route::resource('book', 'BookController', [
        'only' => [
            'create',
            'store',
            'index',
        ],
    ]);
    Route::group(['prefix' => 'book/ajax'], function() {
        Route::get('list', ['uses' => 'BookController@ajaxList', 'as' => 'admin.book.ajaxList']);
        Route::delete('delete', ['uses' => 'BookController@ajaxDelete', 'as' => 'admin.book.ajaxDelete']);
        Route::post('update', ['uses' => 'BookController@ajaxUpdate', 'as' => 'admin.book.ajaxUpdate']);
    });
    Route::get('book-request', [ 'uses' => 'BookRequestController@index', 'as' => 'admin.bookRequest.index']);
    Route::group(['prefix' => 'book-request/ajax'], function() {
        Route::get('list', ['uses' => 'BookRequestController@ajaxList', 'as' => 'admin.bookRequest.ajaxList']);
        Route::delete('delete', ['uses' => 'BookRequestController@ajaxDelete', 'as' => 'admin.bookRequest.ajaxDelete']);
        Route::post('accept', ['uses' => 'BookRequestController@ajaxAccept', 'as' => 'admin.user.ajaxAccept']);
    });
    Route::get('user', [ 'uses' => 'UserController@index', 'as' => 'admin.user.index']);
    Route::group(['prefix' => 'user/ajax'], function() {
        Route::get('list', ['uses' => 'UserController@ajaxList', 'as' => 'admin.user.ajaxList']);
        Route::delete('delete', ['uses' => 'UserController@ajaxDelete', 'as' => 'admin.user.ajaxDelete']);
        Route::post('update', ['uses' => 'UserController@ajaxUpdate', 'as' => 'admin.user.ajaxUpdate']);
        Route::post('create', ['uses' => 'UserController@ajaxCreate', 'as' => 'admin.user.ajaxCreate']);
        Route::post('resetPassword', [
            'uses' => 'UserController@ajaxResetPassword',
            'as' => 'admin.user.ajaxResetPassword'
        ]);
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

Route::resource('users', 'UserController');

Route::group(['middleware' => 'auth'], function() {
    Route::get('profile-preview', [
        'uses' => 'UserController@getEditProfile',
        'as' => 'getEditProfile'
    ]);

    Route::post('profile-preview', [
        'uses' => 'UserController@postUpdateProfile',
        'as' => 'updateProfile'
    ]);

    Route::post('postFollowUser', [
        'uses' => 'UserController@postFollowUser',
        'as' => 'postFollowUser'
    ]);
});
