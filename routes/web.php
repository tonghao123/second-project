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
<<<<<<< HEAD
Route::get('/intergral','home\Intergral\IndexController@intergral');

Route::get('home/index','Home\IndexController@index');
=======

Route::get('home/login','Home\UserController@login');//显示登陆
Route::post('/singin','Home\UserController@singin');//处理登录
Route::get('home/reg','Home\UserController@reg');//显示注册
Route::get('/login','Home\UserController@reg');//重定向到登陆
Route::post('/store','Home\UserController@store');//保存信息
Route::get('/verify/{confirmed_code}','Home\UserController@emailConfirm');//验证邮箱
Route::get('/logout', 'Home\UserController@logout');//登陆退出
Route::get('model/homemodel','Home\IndexController@index');
Route::get('home/photo','Home\IndexController@photo');


>>>>>>> shen
