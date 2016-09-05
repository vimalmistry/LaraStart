<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Mail\OrderShipped;


Route::get('/', function () {

//    \Mail::to('vimalmistry10@gmail.com')->send(new OrderShipped('Vimal Mitry'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/resend-email', 'Auth\RegisterController@resendEmail');

Route::get('/activate/{code}', 'Auth\RegisterController@activateAccount');


// LARAVEL SOCIALITE AUTHENTICATION ROUTES
Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);



Route::get('manage/profile','Manage\ProfileController@showProfile');



Route::group(['prefix'=>'example'],function(){

    //Datatable Example
    Route::get('/datatable','Example\DataTableController@showDatatables');
    Route::get('/datatable/anyData','Example\DataTableController@anyData');

});


Route::group(['prefix'=>'cpanel','middleware'=>'auth','namespace'=>'Cpanel'],function(){

    Route::get('/','DashboardController@index');

});

//
//Route::controller('datatables', 'Manage\ProfileController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);
