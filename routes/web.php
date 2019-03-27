<?php

Route::get('/', function () {
    return view('main');
});
//
//Route::get('/', function () {
//    return view('profile');
//});
Route::group([

    'middleware' => 'api',
    'prefix' => 'user',

], function ($router) {

    Route::post('/', 'UserController@create');


//    Route::post('update-password', 'UserController@updatePassword');
//    Route::get('me', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

//    Route::post('forgot-password', 'AuthController@forgotPassword');
//    Route::post('reset-password', 'AuthController@resetPassword');
//
//    Route::get('refresh', 'AuthController@refresh')->middleware('jwt.verify');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
