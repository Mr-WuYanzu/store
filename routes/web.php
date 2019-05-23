<?php

Route::get('/','home\HomeController@index');
//购物车列表
Route::get('/cart/list','cart\CartController@cart_list');
//加入购物车
Route::get('/cart/{goods_id?}','cart\CartController@cart_add');


