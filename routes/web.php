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
//新建相册名
Route::post('/home/doalbum','Home\IndexController@doalbum');
//上传图片
Route::post('/home/upphoto/{id?}','Home\IndexController@upphoto');
//删除相册
Route::get('/home/delpho/{id}','Home\IndexController@delpho');
//相册里的图片
Route::get('/home/photos/{id}','Home\IndexController@photos');
Route::get('/home/delphos/{id}','Home\IndexController@delphos');
//更新日志
Route::get('/home/updatediary/{id}','Home\IndexController@updatediary');
//处理更新的日志
Route::post('/home/doupdiary','Home\IndexController@doupdiary');
//删除日志
Route::get('/home/deldiary/{id}','Home\IndexController@deldiary');
//好友
Route::get('/home/friends','Home\IndexController@friends');
//我关注的好友
Route::get('/home/myfriends','Home\IndexController@myfriends');
//关注我的好友
Route::get('/home/friendsmy','Home\IndexController@friendsmy');
//查好友
Route::get('/home/addfriends','Home\IndexController@addfriends');
//查好友
Route::any('/home/searchfriends','Home\IndexController@searchfriends');
//Route::get('/home/searchfriends','Home\IndexController@searchfriends');
//处理关注好友
Route::get('/home/doattention/{id?}','Home\IndexController@doattention');
//删除好友
Route::get('/home/delfriends/{id}','Home\IndexController@delfriends');
//删除我关注的好友
Route::get('/home/delmyfriends/{id}','Home\IndexController@delmyfriends');
//留言
Route::get('/home/words','Home\IndexController@words');
//删除自己这边的留言
Route::get('/home/wordsmydel/{id}','Home\IndexController@wordsmydel');
//给好友的留言
Route::get('/home/wordstofriends','Home\IndexController@wordstofriends');
//删除自己发出的留言
Route::get('/home/wordsdel/{id}','Home\IndexController@wordsdel');
//给好友留言页
Route::get('/home/wtf','Home\IndexController@wtf');
//处理留言
Route::post('home/wordsdo/{id}','Home\IndexController@wordsdo');
//--------------------------------------------------------------------------------举报中心
Route::any('home/report','Home\IndexController@report');
//--------------------------------------------------------------------------------关于我们
Route::get('home/aboutme','Home\IndexController@aboutme');
//---------------------------------------------------------------------------------发送号码
Route::post('home/sendcode','Home\IndexController@sendcode');
//Route::post('home/checkreport','Home\IndexController@checkreport');

//s
Route::get('home/myindex','Home\IndexController@myindex');//显示个人主页
Route::get('home/information','Home\IndexController@information');//显示资料页
Route::get('/lamp','Home\IndexController@four');//四级联动
//个人中心
Route::post('/doinformation','Home\IndexController@doinformation');//修改个人信息
Route::post('/doschool','Home\IndexController@doschool');//资料中的学校信息
Route::post('/dowork','Home\IndexController@dowork');//资料中的工作信息
Route::post('/dolike','Home\IndexController@dolike');//资料中的喜欢的信息

//--------------------------------------------------------------------------------------------------------------------------
//后台登录页
Route::get('admin/login','Admin\IndexController@login');
//处理登录页
//Route::post('admin/dologin','Admin\IndexController@dologin');

//--------------------------------------------------------------------------------后台相册管理
//处理图片
Route::get('admin/album','Admin\IndexController@album');
//添加相册
Route::get('admin/album/add','Admin\IndexController@albumadd');
//处理添加相册
Route::post('admin/doalbumadd','Admin\IndexController@doalbumadd');
//删除相册
Route::get('admin/album/del/{id}','Admin\IndexController@doalbumdel');
//更新相册
Route::any('admin/album/up/{id?}','Admin\IndexController@albumup');
//查看相册中的图片
Route::get('admin/album/look/{id}','Admin\IndexController@albumlook');
//删除单张相册里的图片
Route::get('admin/photo/del/{id}','Admin\IndexController@photodel');
//查看图片
Route::get('admin/photo/look/{id}','Admin\IndexController@photolook');
//新增图片 id是相册id
Route::get('admin/photo/add/{id}','Admin\IndexController@photoadd');
//新增图片 的处理
Route::post('/admin/dophotoadd','Admin\IndexController@dophotoadd');
//更新图片 的处理
Route::post('/admin/photo/up/{id}','Admin\IndexController@photoup');
//--------------------------------------------------------------------------------后台好友管理
//好友管理
Route::get('/admin/friends','Admin\IndexController@friends');
//删除好友的关系
Route::get('/admin/friends/del/{id}','Admin\IndexController@friendsdel');
//增加好友关系
Route::get('/admin/friends/add','Admin\IndexController@friendsadd');
//处理增加好友关系
Route::post('/admin/friends/doadd','Admin\IndexController@friendsdoadd');
//修改好友页面
Route::get('/admin/friends/up/{id}','Admin\IndexController@friendsup');
//处理修改好友的页面
Route::post('/admin/friends/doup/{id}','Admin\IndexController@friendsdoup');
//查看好友页面
Route::get('/admin/friends/look/{id}','Admin\IndexController@friendslook');

//--------------------------------------------------------------------------------后台广告管理
//广告页面
Route::get('/admin/advert','Admin\IndexController@advert');
//删除广告
Route::get('/admin/advert/del/{id}','Admin\IndexController@advertdel');
//增加广告的页面
Route::get('/admin/advert/add','Admin\IndexController@advertadd');
//增加广告的页面
Route::post('/admin/advert/doadd','Admin\IndexController@advertdoadd');
//查看广告
Route::get('/admin/advert/look/{id}','Admin\IndexController@advertlook');
//修改广告的页面
Route::get('/admin/advert/up/{id}','Admin\IndexController@advertup');
//修改广告的处理
Route::post('/admin/advert/doup/{id}','Admin\IndexController@advertdoup');

//--------------------------------------------------------------------------------后台日志管理
//日志主页
Route::get('admin/diary','Admin\IndexController@diary');
//查看日志页
Route::get('admin/diary/look/{id}','Admin\IndexController@diarylook');
//查看日志的修改页面
Route::get('admin/diary/up/{id}','Admin\IndexController@diaryup');
//处理日志的修改页面
Route::post('admin/diary/doup/{id}','Admin\IndexController@diarydoup');
//添加日志
Route::get('admin/diary/add','Admin\IndexController@diaryadd');
//添加日志的处理
Route::post('admin/diary/doadd','Admin\IndexController@diarydoadd');
//删除日志
Route::get('admin/diary/del/{id}','Admin\IndexController@diarydel');

//------------------------------------------------------------------------------留言管理
//查看留言
Route::get('admin/words','Admin\IndexController@words');
//留言管理
Route::get('admin/words/look/{id}','Admin\IndexController@wordslook');
//删除留言
Route::get('admin/words/del/{id}','Admin\IndexController@wordsdel');

//------------------------------------------------------------------------------关于我们管理
//关于我们管理主页面
Route::get('admin/aboutme','Admin\IndexController@aboutme');
//关于我们管理新增
Route::get('admin/aboutme/add','Admin\IndexController@aboutmeadd');
//关于我们管业的新增处理
Route::post('admin/aboutme/doadd','Admin\IndexController@aboutmedoadd');
//关于我们管理的查看
Route::get('admin/aboutme/look/{id}','Admin\IndexController@aboutmelook');
//关于我们管理的删除
Route::get('admin/aboutme/del/{id}','Admin\IndexController@aboutmedel');
//关于我们管理的更改
Route::get('admin/aboutme/up/{id}','Admin\IndexController@aboutmeup');
//关于我们管理的更改页面的处理
Route::post('admin/aboutme/doup/{id}','Admin\IndexController@aboutmedoup');
//-----------------------------------------------------------------------------------举报管理
Route::get('admin/report','Admin\IndexController@report');
//删除举报
Route::get('admin/report/del/{id}','Admin\IndexController@reportdel');
//查看举报
Route::get('admin/report/look/{id}','Admin\IndexController@reportlook');
//--------------------------------------------------------------------------------------------------------------------------
//Route::get('admin/ii','Admin\IndexController@ii');


Route::get('admin/index','admin\IndexController@lists');//显示用户列表
Route::get('admin/index/{id}','admin\IndexController@delete');//删除用户
Route::get('/showschool','admin\IndexController@showschool');//显示用户学校信息
Route::post('admin/school/{uid}','admin\IndexController@school');//修改用户学校信息
Route::get('/showwork','admin\IndexController@showwork');//显示用户公司信息
Route::post('admin/work/{uid}','admin\IndexController@work');//修改用户学校信息
Route::get('/showlike','admin\IndexController@showlike');//显示用户喜欢的信息
Route::post('admin/like/{uid}','admin\IndexController@like');//修改用户喜欢的信息
Route::get('/showinformation','admin\IndexController@showinformation');//显示用户基本的信息
Route::post('admin/information/{uid}','admin\IndexController@information');//修改用户基本的信息
Route::get('admin/showadd','admin\IndexController@showadd');//显示添加用户的页面
Route::post('/add','admin\IndexController@add');//添加用户


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

//发短信
//Route::get('sendSMS','Home\UserController@sendSMS');





