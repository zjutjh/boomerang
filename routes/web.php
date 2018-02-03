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




//Route::group(['middleware' => 'web'], function () {
//
//});




Route::any('api/auto_login', 'Auth\LoginController@autoLogin');
Route::any('api/new/lists','NewController@latest');
Route::any('api/lost/lists','ItemController@LostList');
Route::any('api/find/lists','ItemController@FoundList');
Route::any('api/mine/lists','MineController@Mine');
Route::any('admin/index','SuperAdminController@Super');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

