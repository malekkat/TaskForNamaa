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

Route::group(['prefix' => 'content','middleware'=>'LangContent'],function() {
    Route::get('/', 'ContentController@index')->name('content.index');
    Route::get('/create', 'ContentController@create')->name('content.create');
    Route::post('/', 'ContentController@store')->name('content.store');
    Route::get('/content-deleted', 'ContentController@get_del_content')->name('content.del_content');
    Route::put('/{id}', 'ContentController@update')->name('content.update');
    Route::get('/{id}', 'ContentController@show')->name('content.show');
    Route::delete('/{id}', 'ContentController@destroy')->name('content.destroy');
    Route::delete('/content-deleted/{id}', 'ContentController@restore')->name('content.restore');

});