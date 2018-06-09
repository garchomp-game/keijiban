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


Auth::routes();

Route::get('/', 'HomeController@index')->name('root_path');
<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('root_path');
=======
Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> e2cc8fe9f7bb3773d510027d179c353f3312eed2

Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('profile', 'ProfileController')->middleware('auth');

Route::resource('boards', 'BoardsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']])->middleware('auth');
