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



