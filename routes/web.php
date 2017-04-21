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
Route::get('date','Home\IndexController@date');//显示天气
Route::get('news','Home\IndexController@news');//显示新闻

Route::get('home/login','Home\UserController@login');//显示登陆
Route::post('/singin','Home\UserController@singin');//处理登录
Route::get('home/reg','Home\UserController@reg');//显示注册
Route::get('/login','Home\UserController@reg');//重定向到登陆
Route::post('/store','Home\UserController@store');//保存信息
Route::get('/verify/{confirmed_code}','Home\UserController@emailConfirm');//验证邮箱
Route::get('/logout', 'Home\UserController@logout');//登陆退出
Route::get('home/index','Home\IndexController@index');
Route::get('home/photo','Home\IndexController@photo');
Route::get('home/diary','Home\IndexController@diary');
Route::get('home/writediary','Home\IndexController@writediary');
Route::post('home/dophoto','Home\IndexController@dophoto');
Route::get('home/center','Home\IndexController@center');


Route::get('admin/index','Admin\IndexController@index');

//个人成长
Route::get('home/character','Home\PersonalGrowth\IndexController@character');
Route::get('home/calendar','Home\PersonalGrowth\IndexController@calendar');
Route::get('home/points','Home\PersonalGrowth\IndexController@points');
Route::get('home/grade','Home\PersonalGrowth\IndexController@grade');
Route::get('home/introduction','Home\PersonalGrowth\IndexController@introduction');
//最近来来访
Route::get('home/comeToVisit','Home\VisitingInformation\IndexController@comeToVisit');
Route::get('home/accessed','Home\VisitingInformation\IndexController@accessed');
//评论
Route::post('home/comment/add','Home\Comment\IndexController@add');
Route::get('home/comment/delete/{id}','Home\Comment\IndexController@delete');
//评论点赞
Route::get('home/comment/zan/{cid}','Home\Comment\IndexController@zan');
Route::get('home/comment/zan2/{cid}','Home\Comment\IndexController@zan2');
//积分
Route::get('home/intergral/timeD','Home\Intergral\IndexController@timeD');