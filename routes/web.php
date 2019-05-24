<?php

Route::get('/','home\HomeController@index');
//购物车列表
Route::get('/cart/list','cart\CartController@cart_list');
//删除购物车订单
Route::get('/cart/del','cart\CartController@cart_del');
//生成订单页面
Route::get('/order/create','order\OrderController@order_view');
//生成订单
Route::post('/order/checkout','order\OrderController@order');
//订单列表
Route::get('/order/order_list','order\OrderController@order_list');
//订单支付
Route::get('/pay/alipay','pay\PayController@pay');


//加入购物车
Route::get('/cart/add/{goods_id?}','cart\CartController@cart_add');


