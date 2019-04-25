<?php

Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
