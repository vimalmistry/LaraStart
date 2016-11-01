<?php


Route::group(['prefix' => 'example'], function () {

    //Datatable Example
    Route::get('/datatable', 'Example\DataTableController@showDatatables');
    Route::get('/datatable/anyData', 'Example\DataTableController@anyData');


    //File Upload

    Route::get('/upload', 'Example\FileUploadController@imageUpload');
    Route::post('/upload', 'Example\FileUploadController@doImageUpload');


});


//Route::resource('example-crud', 'ExampleCrudController');


//
//Route::controller('datatables', 'Manage\ProfileController', [
//    'anyData'  => 'datatables.data',
//    'getIndex' => 'datatables',
//]);

//Route::resource('posts', 'PostsController');
//Route::resource('example-crud', 'ExampleCrudController');