<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('posts', 'PostController@index');
    Route::post('posts', 'PostController@store');
    Route::post('posts/{post}', 'PostController@update');
    Route::delete('posts/{post}', 'PostController@destroy');

    Route::get('clients', 'ClientController@index');
    Route::post('clients', 'ClientController@store');
    Route::post('clients/{client}', 'ClientController@update');
    Route::delete('clients/{client}', 'ClientController@destroy');

    // User module
    Route::get('user', 'Auth\UserController@current');
    Route::get('users', 'Auth\UserController@index');
    Route::get('users/{user}', 'Auth\UserController@show');
    Route::post('users', 'Auth\UserController@store');
    Route::post('users/{user}', 'Auth\UserController@update');
    Route::delete('users/{user}', 'Auth\UserController@destory');
    Route::get('countries', 'Auth\UserController@getCountries');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
});