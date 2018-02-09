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
    Route::get('api/mine/lists','MineController@Mine');
    Route::get('admin/index','SuperAdminController@Super');
});

Route::any('git/pull',  function (Request $request) {
    Artisan::call('git:pull', [
        'ref' => $request->get('ref')
    ]);
});

