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
    return view('index');
});
Route::get('items-lists', ['as'=>'items-lists','uses'=>'ItemSearchController@index']);
Route::post('create-item', ['as'=>'create-item','uses'=>'ItemSearchController@create']);
Route::get('api/detail/{id}',['uses'=>'DetailController@getDetail']);
Route::get('api/mine/detail/{uid}/{id}',['uses'=>'MydetailController@Mydetail']);
Route::get('admin/detail/{id}',['uses'=>'AdmindetailController@getDetail']);
Route::any('admin/super/list',['uses'=>'SuperadminController@add']);
Route::any('admin/super/list',['uses'=>'SuperadminController@delete']);