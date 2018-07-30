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

use Illuminate\Http\Request;

Route::get('/', 'Auth\LoginController@oauth');
Route::get('/index', 'Auth\LoginController@index');
Route::get('items-lists', ['as'=>'items-lists','uses'=>'ItemSearchController@index']);
Route::post('create-item', ['as'=>'create-item','uses'=>'ItemSearchController@create']);

Route::post('api/auto_login', 'Auth\LoginController@autoLogin');
//Route::post('admin/login', '');
Route::group(['middleware' => ['api.auth']], function () {
    Route::get('api/detail/{id}',['uses'=>'DetailController@getDetail']);
    Route::get('api/mine/detail/{uid}/{id}',['uses'=>'MydetailController@Mydetail']);
    Route::get('admin/detail/{id}',['uses'=>'AdmindetailController@getDetail']);
    Route::get('admin/super/list',['uses'=>'SuperAdminController@add']);
    Route::get('admin/super/list',['uses'=>'SuperAdminController@delete']);
    Route::get('api/new/lists','NewController@latest');
    Route::get('api/lost/lists','ItemController@LostList');
    Route::get('api/find/lists','ItemController@FoundList');
    Route::get('api/mine/lists/{uid}','MineController@Mine');
    Route::get('api/search', 'ItemSearchController@search');
    Route::get('api/item/classify','ItemController@classify');
    Route::post('api/item/create', 'ItemController@createItem');
    Route::post('api/item/update', 'ItemController@uploadItem');
    Route::post('api/item/image/upload', 'ItemController@uploadImg');
    Route::post('api/item/image/delete', 'ItemController@deleteImg');
    Route::post('api/item/delete', 'ItemController@delete');

    Route::get('admin/index','SuperAdminController@Super');
});

Route::get('send/detail/{itemUid}', 'DetailController@show');



