<?php

Route::get('/','home\HomeController@index');
//加入购物车
Route::get('/cart/{goods_id?}','cart\CartController@cart_add');

