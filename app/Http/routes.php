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

// Dashboard Routes
Route::group(
    [
        'prefix' => 'dashboard',
        'namespace' => 'Dashboard'
    ],
    function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    }
);

// Site Routes
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['as' => 'site', 'uses' => 'HomeController@index']);
});

// Auth Routes
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('register', 'Auth\AuthController@redirectToRegister');
Route::post('register', 'Auth\AuthController@register');
