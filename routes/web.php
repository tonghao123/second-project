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

Route::get('home/login','Home\UserController@login');
Route::post('/singin','Home\UserController@singin');
Route::get('home/reg','Home\UserController@reg');
Route::get('/login','Home\UserController@reg');
Route::post('/store','Home\UserController@store');
Route::get('/verify/{confirmed_code}','Home\UserController@emailConfirm');
Route::get('/logout', 'Home\UserController@logout');

