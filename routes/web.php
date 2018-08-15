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
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/timelines', 'TimelinesController@index')->name('timelines');

Route::group(['as'=>'admin.', 'prefix'=>'admin'], function() {
	Route::resource('/videos', 'AdminVideosController');
});

