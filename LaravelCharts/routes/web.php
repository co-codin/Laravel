<?php

Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
