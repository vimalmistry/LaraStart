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

function getFile($path)
{
    return require_once __DIR__.$path;
}



Route::get('/', function () {

    return view('welcome');
});


require_once __DIR__ . "/auth/auth.php";


//Route::get('manage/profile','Manage\ProfileController@showProfile');
Route::get('/home', 'HomeController@index');


/**
 * Example files
 */
getFile('/example/example.php');
/**
 * Cpanel
 */
getFile('/cpanel/cpanel.php');


