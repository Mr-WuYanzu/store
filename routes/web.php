<?php

Route::get('/','home\HomeController@index');

//收藏
Route::get('/collect/add/{goods_id?}','collect\CollectController@add');//加入收藏
Route::get('/collect/wishlist','collect\CollectController@wishlist');//心愿列表
Route::get('/collect/del','collect\CollectController@del');//收藏删除