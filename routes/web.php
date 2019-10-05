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
    Route::get('/Cart', 'CartController@index');
    Route::get('/Test', 'TestController@index');


    Route::get('/Pay', 'PayController@Pay');

    Route::group(['prefix' => '/Show'], function () {
    Route::get('/Page', 'ShowPageController@index');

    Route::get('/Content', 'ShowContentController@index');
    Route::get('/Content/{id}', 'ShowContentController@index');
    });

    Route::group(['prefix' => '/User'], function () {
        Route::get('MyAccount', 'AccountController@index');
        Route::get('Login', 'AccountController@Login');
    });

    Route::group(['prefix' => '/api'], function () {
        Route::get('/Contact', ['as'=>'Get.Contact','uses'=>'ApiController@Contact']);
        Route::get('/Product', ['as'=>'Get.Product','uses'=>'ApiController@Product']);
        Route::get('/Cart', ['as'=>'Get.Cart','uses'=>'ApiController@Cart']);
    });

});
