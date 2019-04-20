<?php

Route::get('/', function () {
    return view('main');
});
Route::group([

    'prefix' => 'users',

], function ($router) {

    Route::get('/{id}', 'UserController@get');
//    Route::post('/avatar', 'RegisterController@updateAvatar');

//    Route::post('update-password', 'UserController@updatePassword');
//    Route::get('me', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

//    Route::post('forgot-password', 'AuthController@forgotPassword');
//    Route::post('reset-password', 'AuthController@resetPassword');
//
//    Route::get('refresh', 'AuthController@refresh')->middleware('jwt.verify');
});


Route::group([

    'prefix' => 'auth',

], function ($router) {

//    Route::post('/', 'RegisterController@create');
    Route::post('/avatar', 'RegisterController@updateAvatar');
    //    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    $this->post('register', 'Auth\RegisterController@register');
});

Auth::routes();
//
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//if ($options['register'] ?? true) {
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register');
//}
//
//// Password Reset Routes...
//if ($options['reset'] ?? true) {
//    Route::resetPassword();
//}
//
//// Email Verification Routes...
//if ($options['verify'] ?? false) {
//    Route::emailVerification();
//}