<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/projects', 'ProjectController@index');
    Route::post('/projects', 'ProjectController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
