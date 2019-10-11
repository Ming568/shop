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
//HOME首页
Route::get('/','Home\IndexController@index');
Route::group(['prefix'=>'home','namespance'=>'Home'],function(){
	
});
//------------------后台Admin
//后台登陆界面
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('login','LoginController@login');
	//后台数据验证
	Route::match(['get','post'],'check','LoginController@check');
});
//后台登陆中间件
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'login'],function(){
	//后台登陆界面
	Route::get('index','IndexController@show');
	//后台退出
	Route::get('logout','LoginController@logout');
	//后台网站信息修改
	Route::get('webinfo','WebInfoController@show');
	//分类模块与搜索
	Route::get('cate','CateController@show');
	//分类模块添加
	Route::get('addCate','CateController@addCate');
	//分类模块删除
	Route::match(['post','get'],'del','CateController@delCate');
	//分类模块修改
	Route::match(['get','post'],'alter/{id}','CateController@alter');
	Route::match(['get','post'],'update','CateController@update');
	//处理分类数据
	Route::match(['post','get'],'add','CateController@add');
	//商品管理展示
	Route::get('goodlist','GoodController@show');
	//商品添加表单渲染
	Route::match(['post','get'],'addgood','GoodController@addGood');
	//商品信息添加
	Route::match(['post','get'],'addgoods','GoodController@addGoods');
	//商品信息删除
	Route::get('shopdel','GoodController@shopDel');
	//商品信息修改
	Route::match(['post','get'],'shopalter/{id}','GoodController@shopAlter');
	Route::match(['post','get'],'shopupdate','GoodController@shopUpdate');
});
//验证码路由
Route::get('/code/captcha/{tmp}','Admin\LoginController@captcha');

