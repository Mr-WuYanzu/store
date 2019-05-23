<?php

Route::get('/','home\HomeController@index');
//商品详情
Route::get('/goodsdetail/{goods_id}','goods\GoodsController@detail');
//分类
Route::get('/brand','goods\GoodsController@brand');