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
Route::get('/', function(){
	return redirect('/login');
});

Route::get('/time', function(){
    return time();
});  //取时间

Route::get('/login', 'LoginController@index');      //登录页面
Route::post('/login/login', 'LoginController@login');   //登录操作
Route::get('/newsList', 'NewsController@index');  //新闻首页
Route::post('/createNews', 'NewsController@createNews');  //添加新闻操作
Route::get('/addNews', 'NewsController@addNews');   //添加新闻页面
Route::get('/setHot', 'NewsController@setHot');     //设置热点新闻操作
Route::get('/outHot', 'NewsController@outHot');     //取消热点新闻操作
Route::get('/toRefuse', 'NewsController@toRefuse');     //放入垃圾箱操作
Route::get('/refuseNews', 'NewsController@refuseNews');     //恢复新闻操作
Route::get('/reList', 'NewsController@reList');         //新闻列表
Route::post('/updataNews', 'NewsController@updataNews');    //更新新闻操作
Route::get('/logout', 'NewsController@logout');     //登出操作
Route::get('/Comments', 'NewsController@getNewAllComms');     //取得评论
Route::get('/getOneNew', 'NewsController@getOneNew');     //根据评论获得某条新闻
Route::get('/newsContent', 'NewsController@newsContent');     //新闻 详情页
Route::post('/addComment', 'NewsController@addComment');     //添加评论

Route::get('/register', 'RegisterController@register');     //注册页面
Route::post('/addAdmin', 'RegisterController@addAdmin');     //注册页面
Route::get('/get', 'NewsController@getNewsWithCom');     //注册页面
