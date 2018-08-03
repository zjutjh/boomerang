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

// 首页oauth路由
Route::get('/', 'Auth\LoginController@oauth');

// oauth回调路由
Route::get('/index', 'Auth\LoginController@index');

// 自动登录
Route::post('api/auto_login', 'Auth\LoginController@autoLogin');
Route::post('api/adminLogin', 'Auth\LoginController@adminLogin');



/**
 * 权限验证
 */

Route::group(['middleware' => ['api.auth']], function () {
    Route::get('api/detail/{id}',['uses'=>'DetailController@getDetail']);
    Route::get('api/mine/detail/{uid}/{id}',['uses'=>'MydetailController@Mydetail']);
    Route::get('admin/detail/{id}',['uses'=>'AdmindetailController@getDetail']);
    Route::get('admin/super/list',['uses'=>'SuperAdminController@add']);
    Route::get('admin/super/list',['uses'=>'SuperAdminController@delete']);
    Route::get('api/new/lists','NewController@latest');
    Route::get('api/lost/lists','ItemController@LostList');
    Route::get('api/find/lists','ItemController@FoundList');

    Route::get('api/getUserInfo','MineController@getUserInfo');
    Route::get('api/mine/lists/found','MineController@found');
    Route::get('api/mine/lists/lost','MineController@lost');
    Route::get('api/mine/lists/unfinished','MineController@unfinished');

    Route::get('api/search', 'ItemSearchController@search');
    Route::post('api/item/create', 'ItemController@createItem');
    Route::post('api/item/update', 'ItemController@uploadItem');
    Route::post('api/item/image/upload', 'ItemController@uploadImg');
    Route::post('api/item/image/delete', 'ItemController@deleteImg');
    Route::post('api/item/delete', 'ItemController@delete');

    Route::get('admin/index','SuperAdminController@Super');
});

// 推送详情
Route::get('send/detail/{itemUid}', 'DetailController@show');



