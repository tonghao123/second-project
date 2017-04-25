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



//新建相册名
Route::post('/home/doalbum','Home\IndexController@doalbum');
//上传图片
Route::post('/home/upphoto','Home\IndexController@upphoto');
//删除相册
Route::get('/home/delpho/{id?}','Home\IndexController@delpho');
//相册里的图片
Route::get('/home/photos/{id?}','Home\IndexController@photos');
Route::get('/home/delphos/{id?}','Home\IndexController@delphos');
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



//s
Route::get('home/myindex','Home\IndexController@myindex');//显示个人主页
Route::get('home/information','Home\IndexController@information');//显示资料页
Route::get('/lamp','Home\IndexController@four');//四级联动
//个人中心
Route::post('/doinformation','Home\IndexController@doinformation');//修改个人信息
Route::post('/doschool','Home\IndexController@doschool');//资料中的学校信息
Route::post('/dowork','Home\IndexController@dowork');//资料中的工作信息
Route::post('/dolike','Home\IndexController@dolike');//资料中的喜欢的信息


//后台登录页
Route::get('admin/login','Admin\IndexController@login');
//处理登录页
//Route::post('admin/dologin','Admin\IndexController@dologin');
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

//rbac
//权限管理
Route::get('/admin/privilege','Auth\PermissionController@privilege');
//添加
Route::any('/admin/profile','Auth\PermissionController@permissionAdd');
//修改
Route::any('/admin/alter/{permission_id}', 'Auth\PermissionController@permissionUpdate');
//删除
Route::get('/admin/delete/{permission_id}', 'Auth\PermissionController@permissionDelete');

//角色管理
//角色列表
Route::get('/admin/role-list', 'Admin\RoleController@roleList');
//增加
Route::any('/admin/role-add', 'Admin\RoleController@roleAdd');
//修改
Route::any('/admin/role-update/{role_id}', 'Admin\RoleController@roleUpdate');
//删除
Route::get('/admin/role-delete/{role_id}', 'Admin\RoleController@roledelete');
//分配权限
Route::any('/admin/assignment/{role_id}', 'Admin\RoleController@assignment');

//管理员管理
Route::get('/admin/user-list', 'Admin\UserController@userList') ;
Route::any('/admin/user-add', 'Admin\UserController@userAdd')->middleware('rbac');
Route::any('/admin/user-update/{user_id}', 'Admin\UserController@userupdate')->middleware('rbac');
Route::any('/admin/user-delete/{user_id}', 'Admin\UserController@userdelete')->middleware('rbac');
Route::any('/admin/attach-role/{user_id}', 'Admin\UserController@allotrole')->middleware('rbac');

//评论管理
Route::get('/admin/comment-list','Admin\CommentController@commentList');
Route::any('/admin/comment-add', 'Admin\CommentController@commentAdd');
Route::any('/admin/comment-update/{comment_id}', 'Admin\CommentController@commentUpdate');
Route::any('/admin/comment-delete/{comment_id}', 'Admin\CommentController@commentDelete');

//积分管理
Route::get('/admin/intergral-list','Admin\IntergralController@intergralList');
Route::any('/admin/intergral-update/{intergral_id}', 'Admin\IntergralController@intergralUpdate');
Route::any('/admin/intergral-delete/{intergral_id}', 'Admin\IntergralController@intergralDelete');

//点赞管理
Route::get('/admin/praise-list','Admin\PraiseController@praiseList');
Route::get('/admin/praise-show/{praise_id}','Admin\PraiseController@praiseShow');
Route::any('/admin/praise-add/{praise_id}', 'Admin\PraiseController@praiseAdd');
Route::any('/admin/praise-delete/{praise_id}', 'Admin\PraiseController@praiseDelete');

//生日提醒管理
Route::get('/admin/birth-list','Admin\BirthController@birthList');
Route::get('/admin/birth-show','Admin\BirthController@birthShow');

Route::get('/admin/gift-show/{birth_id}','Admin\BirthController@giftShow');
Route::any('/admin/gift-add/{birth_id}','Admin\BirthController@giftAdd');
Route::any('/admin/gift-delete/{birth_id}','Admin\BirthController@giftDelete');

//前台生日管理
Route::post('/home/gift','Home\Gift\IndexController@gift');
