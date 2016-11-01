<?php

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/login/check','Auth\LoginController@checkEmail');
Route::get('/register/check','Auth\RegisterController@checkEmailExist');



Route::get('/resend-email', 'Auth\RegisterController@resendEmail');

Route::get('/activate/{code}', 'Auth\RegisterController@activateAccount');


// LARAVEL SOCIALITE AUTHENTICATION ROUTES
Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);
