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


    Route::get('/Pay',  ['as'=>'Send.Pay','uses'=>'PayController@Pay']);

    Route::group(['prefix' => '/Show'], function () {
    Route::get('/Page', 'ShowPageController@index');

    Route::get('/Content', 'ShowContentController@index');
    Route::get('/Content/{id}', 'ShowContentController@index');
    });

    Route::group(['prefix' => '/User'], function () {
        Route::get('MyAccount', 'AccountController@index');
        Route::get('Login', 'AccountController@Login');
        Route::post('/LogOut', ['as'=>'User.Logout','uses'=>'AccountController@LogOut']);
    });

    Route::group(['prefix' => '/api'], function () {
        Route::get('/Contact', ['as'=>'Get.Contact','uses'=>'ApiController@Contact']);
        Route::get('/Product', ['as'=>'Get.Product','uses'=>'ApiController@Product']);


        Route::get('/Cart', ['as'=>'Get.Cart','uses'=>'ApiController@GetCart']);
        Route::post('/Cart', ['as'=>'Send.Cart','uses'=>'ApiController@AddCart']);


        Route::get('/User', ['as'=>'Get.Users','uses'=>'ApiController@Users']);
        Route::get('/User/{id}', ['as'=>'Get.User','uses'=>'ApiController@User']);
        Route::post('/Login', ['as'=>'User.Login','uses'=>'ApiController@Login']);
        Route::post('/CheckEmail', ['as'=>'User.CheckEmail','uses'=>'ApiController@CheckEmail']);
        Route::post('/Register', ['as'=>'User.Register','uses'=>'ApiController@Register']);



        Route::get('/Content', ['as'=>'Get.Content','uses'=>'ApiController@Contents']);
        Route::get('/Content/{id}', ['as'=>'Get.Cart','uses'=>'ApiController@Content']);


        Route::post('/Comment', ['as'=>'Send.Comment','uses'=>'ApiController@SendComment']);


        Route::post('/Contact', ['as'=>'Send.Contact','uses'=>'ApiController@SendContact']);
    });
    Route::group(['prefix' => '/Admin'], function () {
        Route::get('/', ['as'=>'Admin','uses'=>'AdminController@index']);
        Route::get('/Content', ['as'=>'Admin','uses'=>'AdminController@Content']);
        Route::get('/User', ['as'=>'Admin','uses'=>'AdminController@User']);
    });
});
