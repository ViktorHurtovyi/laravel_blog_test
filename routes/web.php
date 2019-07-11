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

Route::get('/', 'articleController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/add', 'articleController@add')->name('add');
    Route::post('/add/request', 'articleController@addRequest')->name('addRequest');
    Route::get('/edit', 'articleController@edit')->where('id', '\d+')->name('edit');
    Route::post('/edit/request', 'articleController@editRequest')->name('editRequest');
    Route::get('/delete', 'articleController@delete')->where('id', '\d+')->name('delete');
});