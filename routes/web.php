<?php

Route::get('/','home\HomeController@index');

Route::get('/register','User\UserController@register');//注册
Route::post('/reg_do','User\UserController@reg_do');//注册执行
Route::get('/login','User\UserController@login');//登录
Route::post('/login_do','User\UserController@login_do');//登录执行
Route::get('/forget','User\UserController@forget');//忘记密码
Route::post('/forget_do','User\UserController@forget_do');//执行找回密码
Route::get('/new_password','User\UserController@new_password');//设置新密码视图
Route::post('/set_new_password','User\UserController@set_new_password');//执行设置新密码
