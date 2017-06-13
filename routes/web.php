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

Route::get('/', 'FormController@showPublic');

Route::post('/', 'FormController@postForm');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'FormController@showEntries');
	Route::get('approve/{id}', 'FormController@approveEntry');
	Route::post('approve/{id}', 'FormController@ajaxApprove');
	Route::get('delete/{id}', 'FormController@deleteEntry');
	Route::post('delete/{id}', 'FormController@ajaxDelete');
});

