<?php

Route::get('/','home\HomeController@index');
//商品详情
Route::get('/goodsdetail/{goods_id}','goods\GoodsController@detail');
//分类
Route::get('/brand/{brand_id?}','goods\GoodsController@brand');

//收藏
Route::get('/collect/add/{goods_id?}','collect\CollectController@add');//加入收藏
Route::get('/collect/wishlist','collect\CollectController@wishlist');//心愿列表
Route::get('/collect/del','collect\CollectController@del');//收藏删除

//用户
Route::get('/register','User\UserController@register');//注册
Route::post('/reg_do','User\UserController@reg_do');//注册执行
Route::get('/login','User\UserController@login');//登录
Route::post('/login_do','User\UserController@login_do');//登录执行
Route::get('/forget','User\UserController@forget');//忘记密码
Route::post('/forget_do','User\UserController@forget_do');//执行找回密码
Route::get('/new_password','User\UserController@new_password');//设置新密码视图
Route::post('/set_new_password','User\UserController@set_new_password');//执行设置新密码
Route::get('/logout','User\UserController@logout');//退出登录
Route::get('/test','User\UserController@test');//退出登录
Route::get('/about_us','User\UserController@about_us');//关于我们
