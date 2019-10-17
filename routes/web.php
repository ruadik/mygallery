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

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('Admin.dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('Admin.logout');
    Route::resource('photos', 'PhotosController');
    Route::resource('category', 'CategoryController');
    Route::resource('users', 'UsersController');
});

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Front\FrontHomeController@index')->name('home');


Route::group(['namespace'=>'Front'], function (){
    Route::get('/', 'FrontHomeController@index')->name('FrontHome');
    Route::get('/photo/{id}', 'FrontHomeController@show')->name('front.photo');
    Route::get('/category/photos/{category}', 'FrontHomeController@categoryPhotos')->name('front.category.photos');
    Route::get('/user/photos/{id}', 'FrontHomeController@userPhotos')->name('front.user.photos');
});


Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function (){
//    Route::get('/', 'ImagesController@index')->name('images.index');
    Route::resource('images', 'ImagesController');
    Route::get('/profile', 'ProfileController@edit')->name('profile.user');
    Route::PUT('/profile/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('/security', 'SecurityController@edit')->name('security.user');
    Route::PUT('/security/{id}', 'SecurityController@update')->name('security.update');
});