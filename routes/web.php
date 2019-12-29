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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'HomeController@index');


//menu
Route::get('/menu', 'MenuController@index');
Route::post('/menu/add', 'MenuController@add')->name('addMenu');
Route::get('/menu/getTree', 'MenuController@getTree')->name('getMenuTree');


//user
Route::get('/user', 'UserController@index'); //显示用户列表
Route::get('/user/list', 'UserController@getList'); //获取用户列表
Route::get('/user/create', 'UserController@create'); //显示创建用户界面
Route::post('/user', 'UserController@store'); //创建新用户
Route::get('/user/{id}', 'UserController@show'); //显示指定用户信息
Route::get('/user/{id}/edit', 'UserController@edit'); //显示编辑用户界面
Route::put('/user/{id}', 'UserController@update'); //更新用户信息
Route::delete('/user/{id}', 'UserController@destroy'); //删除用户
