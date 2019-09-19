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
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/About', 'AboutController@index');
    Route::get('/Contact', 'ContactController@index');
    Route::get('/test', 'TestController@test');

    Route::group(['prefix' => '/Show'], function () {
    Route::get('/Page', 'ShowPageController@index');
    Route::get('/Content', 'ShowContentController@index');
    });

    Route::group(['prefix' => '/api'], function () {
        Route::get('/Contact', ['as'=>'Get.Contact','uses'=>'ApiController@Contact']);
    });
});
