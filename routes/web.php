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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {

    Route::get('/', 'DashboardController@index')->name('Admin.dashboard');
    Route::resource('photos', 'PhotosController');
    Route::resource('category', 'CategoryController');
    Route::resource('users', 'UsersController');
});