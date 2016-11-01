<?php




Route::group(['prefix'=>'cpanel','middleware'=>'auth','namespace'=>'Cpanel'],function(){

    Route::get('/','DashboardController@index');



    Route::group(['prefix'=>'manage-users'],function(){

        Route::get('/','UsersController@index');
        Route::get('/data','UsersController@data');
        Route::get('/edit/{id}','UsersController@edit');
    });



    //Permission Crud
    Route::get('/manage-permissions','PermissionController@index');
    Route::get('/manage-permissions/data','PermissionController@data');
    Route::get('/manage-permissions/create','PermissionController@create');
    Route::post('/manage-permissions/create','PermissionController@store');
//    Route::resource('manage-permission', 'PermissionController');


});
