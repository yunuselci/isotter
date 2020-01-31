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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','UserController@index')->name('users.index');

Route::get('/users/{userId}', 'UserController@show')->name('users.show');

Route::post('/users/{userId}/follow', 'UserController@follow')->name('users.follow');

Route::get('/users/{userId}/followers', 'UserController@followers')->name('users.followers');

Route::get('/users/{userId}/following', 'UserController@followings')->name('users.followings');

