<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

$admin = [
    'prefix' => 'admin',
    'namespace' => 'Admin',
];

Route::group($admin , function(){

    Route::get('login' , 'AuthController@getLogin')->name('getAdminLogin');
    Route::post('login' , 'AuthController@postLogin')->name('postAdminLogin');
    Route::get('logout' , 'AuthController@getLogout')->name('getAdminLogout');
    Route::any('enterpassword' , 'AuthController@getEnterpassword')->name('getEnterpassword');

    //login
    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/', 'IndexController@getIndex')->name('Admin.getIndex');
        Route::post('/', 'IndexController@postIndex')->name('Admin.postIndex');
        Route::any('ajax', 'AjaxController@getIndex')->name('Admin.Ajax');

        Route::controller('feedback', 'FeedbackController', ['getIndex' => 'Feedback.getIndex', 'getCreate' => 'Feedback.getCreate', 'postCreate' => 'Feedback.postCreate', 'getUpdate' => 'Feedback.getUpdate', 'postUpdate' => 'Feedback.postUpdate', 'getDelete' => 'Feedback.getDelete',]);
    });
});