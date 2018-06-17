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

// 認証
Auth::routes();

// トップ画面複数ルート対応化
Route::get('/', 'HomeController@index')->name('root_path');
Route::get('/home', 'HomeController@index')->name('home');

// 個別ルート

// resource群
Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('profile', 'ProfileController')->middleware('auth');

Route::resource('boards', 'BoardsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']])->middleware('auth');
Route::resource('chat', 'ChatController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']])->middleware('auth');
