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

Route::group(['prefix' => 'user','middleware'=>'LangUser'],function() {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create','UserController@create')->name('user.create');
        Route::post('/','UserController@store')->name('user.store');
        Route::get('/all-users','UserController@gel_all_users')->name('user.getAll');
        Route::get('/{id}', 'UserController@show')->name('user.show')->where('id', '[0-9]+');
        Route::put('/{id}', 'UserController@update')->name('user.update');
        Route::get('/change-pass/{id}', 'UserController@change_pass')->name('user.changePass')->where('id', '[0-9]+');
        Route::post('/change-pass/{id}', 'UserController@changed_pass')->name('user.changed')->where('id', '[0-9]+');


});

