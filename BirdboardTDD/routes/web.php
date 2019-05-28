<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
