<?php




Auth::routes();
Route::group(['prefix' => '/'], function () {
    Route::get('/', ['as'=>'Home','uses'=>'HomeController@index']);
    Route::get('/About', 'AboutController@index');
    Route::get('/Contacts', 'ContactController@index');
    Route::get('/Cart', 'CartController@index');
    Route::get('/Test', 'TestController@index');
    Route::get('/Access', 'ErrorController@Access');


    Route::post('/Pay',  ['as'=>'Send.Pay','uses'=>'PayController@Pay']);
    Route::get('/redi_pay',  ['as'=>'Send.Pay2','uses'=>'PayController@redi_pay']);

    Route::group(['prefix' => '/Show'], function () {
        Route::get('/Page', 'ShowPageController@index');

        Route::get('/Content', 'ShowContentController@index');
        Route::get('/Content/{id}', 'ShowContentController@index');
    });

    Route::group(['prefix' => '/User'], function () {
        Route::get('MyAccount', 'AccountController@index');
        Route::get('Login', 'AccountController@Login');
        Route::get('/LogOut', ['as'=>'User.Logout','uses'=>'AccountController@LogOut']);
    });
    /*/////////////////////////////////////////Api//////////////////////////////////////////*/
    Route::group(['prefix' => '/api'], function () {
        Route::get('/Contact', ['as'=>'Get.Contact','uses'=>'ApiController@Contact']);
        Route::get('/Product', ['as'=>'Get.Product','uses'=>'ApiController@Product']);


        Route::get('/Cart', ['as'=>'Get.Cart','uses'=>'ApiController@GetCart']);
        Route::post('/Cart', ['as'=>'Send.Cart','uses'=>'ApiController@AddCart']);

        Route::get('/Order', ['as'=>'Get.Orders','uses'=>'ApiController@GetOrder']);


        Route::get('/User', ['as'=>'Get.Users','uses'=>'ApiController@Users']);
        Route::get('/User/{id}', ['as'=>'Get.User','uses'=>'ApiController@User']);
        Route::post('/Login', ['as'=>'User.Login','uses'=>'ApiController@Login']);
        Route::post('/CheckEmail', ['as'=>'User.CheckEmail','uses'=>'ApiController@CheckEmail']);
        Route::post('/Register', ['as'=>'User.Register','uses'=>'ApiController@Register']);



        Route::get('/Content', ['as'=>'Get.Content','uses'=>'ApiController@Contents']);
        Route::get('/Content/{id}', ['as'=>'Get.ContentID','uses'=>'ApiController@Content']);


        Route::post('/Comment', ['as'=>'Send.Comment','uses'=>'ApiController@SendComment']);


        Route::post('/Contact', ['as'=>'Send.Contact','uses'=>'ApiController@SendContact']);

        Route::get('/Category', ['as'=>'Get.Category','uses'=>'ApiController@GetCategory']);

        Route::get('/State', ['as'=>'Get.State','uses'=>'ApiController@GetState']);

        Route::get('/Address', ['as'=>'Address','uses'=>'ApiController@GetAddress']);
        Route::get('/Address/{id}', ['as'=>'AddressID','uses'=>'ApiController@GetAddress']);
        Route::post('/Address', ['as'=>'Send.Address','uses'=>'ApiController@SendAddress']);
    });
    /*/////////////////////////////////////////Session//////////////////////////////////////////*/
    Route::group(['prefix' => '/Session'], function () {
        Route::get('/Login', ['as'=>'Admin','uses'=>'SessionController@SetLogin']);
        Route::get('/Login/{id}', ['as'=>'Admin','uses'=>'SessionController@SetLogin']);
        Route::get('/Logout', ['as'=>'Admin','uses'=>'SessionController@Logout']);
        Route::get('/CheckLogin', ['as'=>'Admin','uses'=>'SessionController@CheckLogin']);
    });
    /*/////////////////////////////////////////Admin//////////////////////////////////////////*/
    Route::group(['prefix' => '/Admin'], function () {
        Route::get('/', ['as'=>'Admin','uses'=>'AdminController@index']);
        Route::get('/Content', ['as'=>'Admin.Content','uses'=>'AdminController@Content']);
        Route::get('/User', ['as'=>'Admin.User','uses'=>'AdminController@User']);
        Route::get('/Order', ['as'=>'Admin.User','uses'=>'AdminController@Order']);
        Route::get('/Product', ['as'=>'Admin.Product','uses'=>'AdminController@Product']);
        Route::get('/Store', ['as'=>'Admin.Store','uses'=>'AdminController@Store']);
        Route::get('/Contact', ['as'=>'Admin.Contact','uses'=>'AdminController@Contact']);
        Route::group(['prefix' => '/api'], function () {
            Route::get('/User', ['as'=>'Admin.api.Users','uses'=>'AdminController@Users']);
            Route::get('/User/{id}', ['as'=>'Admin.api.User','uses'=>'AdminController@UserID']);
            Route::get('/Content', ['as'=>'Admin.api.Contents','uses'=>'AdminController@Contents']);
            Route::get('/Content/{id}', ['as'=>'Admin.api.Content','uses'=>'AdminController@ContentID']);
            Route::get('/Order', ['as'=>'Admin.api.Order','uses'=>'AdminController@Orders']);
            Route::get('/Order/{id}', ['as'=>'Admin.api.OrderID','uses'=>'AdminController@OrderID']);

            Route::get('/Statistics', ['as'=>'Admin.api.Statistics','uses'=>'AdminController@Statistics']);

            Route::post('/SendContent', ['as'=>'Admin.api.SendContent','uses'=>'AdminController@SendContent']);
            Route::post('/SendProduct', ['as'=>'Admin.api.SendProduct','uses'=>'AdminController@SendProduct']);
            Route::post('/SendTag', ['as'=>'Admin.api.SendTag','uses'=>'AdminController@SendTag']);
            Route::post('/SendSpecification', ['as'=>'Admin.api.SendSpecification','uses'=>'AdminController@SendSpecification']);
            Route::post('/SendIntroduction', ['as'=>'Admin.api.SendIntroduction','uses'=>'AdminController@SendIntroduction']);
            Route::post('/SendIamge', ['as'=>'Admin.api.SendIamge','uses'=>'AdminController@SendImage']);
            Route::post('/SendSubSpecification', ['as'=>'Admin.api.SendSubSpecification','uses'=>'AdminController@SendSubSpecification']);

            Route::get('/Store', ['as'=>'Admin.api.GetStore','uses'=>'AdminController@GetStore']);
            Route::post('/Store', ['as'=>'Admin.api.SendStore','uses'=>'AdminController@SendStore']);

            Route::get('/Product/Get', ['as'=>'Admin.api.GetProduct','uses'=>'AdminController@GetProduct']);
            Route::Post('/Product/Add', ['as'=>'Admin.api.SendProduct','uses'=>'AdminController@SendProducts']);

            Route::get('/Contact/Get', ['as'=>'Admin.api.GetContact','uses'=>'AdminController@GetContacts']);

        });
    });
});
