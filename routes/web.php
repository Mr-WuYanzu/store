<?php

Route::get('/','home\HomeController@index');
<<<<<<< HEAD
//商品详情
Route::get('/goodsdetail/{goods_id}','goods\GoodsController@detail');
//分类
Route::get('/brand/{brand_id?}','goods\GoodsController@brand');

//收藏
Route::get('/collect/add/{goods_id?}','collect\CollectController@add');//加入收藏
Route::get('/collect/wishlist','collect\CollectController@wishlist');//心愿列表
Route::get('/collect/del','collect\CollectController@del');//收藏删除

Route::get('/register','User\UserController@register');//注册
Route::post('/reg_do','User\UserController@reg_do');//注册执行
Route::get('/login','User\UserController@login');//登录
Route::post('/login_do','User\UserController@login_do');//登录执行
Route::get('/forget','User\UserController@forget');//忘记密码
Route::post('/forget_do','User\UserController@forget_do');//执行找回密码
Route::get('/new_password','User\UserController@new_password');//设置新密码视图
Route::post('/set_new_password','User\UserController@set_new_password');//执行设置新密码
=======
//购物车列表
Route::get('/cart/list','cart\CartController@cart_list');
//删除购物车订单
Route::get('/cart/del','cart\CartController@cart_del');
//生成订单页面
Route::get('/order/create','order\OrderController@order_view');
//生成订单
Route::get('/order/checkout','order\OrderController@order');


//加入购物车
Route::get('/cart/add/{goods_id?}','cart\CartController@cart_add');


>>>>>>> cart
