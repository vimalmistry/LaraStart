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


//    $user = App\User::findOrFail($id);
//
//    $user->hide();
//    return $user->toArray();


//    \Mail::to('vimalmistry10@gmail.com')->send(new OrderShipped('Vimal Mitry'));
    return view('welcome');
});

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/login/check','Auth\LoginController@checkEmail');
Route::get('/register/check','Auth\RegisterController@checkEmailExist');

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


    //File Upload

    Route::get('/upload','Example\FileUploadController@imageUpload');
    Route::post('/upload','Example\FileUploadController@doImageUpload');


});


Route::group(['prefix'=>'cpanel','middleware'=>'auth','namespace'=>'Cpanel'],function(){

    Route::get('/','DashboardController@index');



    //Permission Crud
    Route::get('/manage-permissions','PermissionController@index');
    Route::get('/manage-permissions/data','PermissionController@data');
    Route::get('/manage-permissions/create','PermissionController@create');
    Route::post('/manage-permissions/create','PermissionController@store');
//    Route::resource('manage-permission', 'PermissionController');


});

Route::resource('example-crud', 'ExampleCrudController');


//
//Route::controller('datatables', 'Manage\ProfileController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);

Route::resource('posts', 'PostsController');
//Route::resource('example-crud', 'ExampleCrudController');