<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '/account', 'middleware' => 'auth', 'namespace' => 'Account'], function () {
    Route::get('/', 'AccountController@index')->name('account');

    Route::group(['prefix' => '/files'], function () {
        Route::post('/{file}', 'FileController@store')->name('account.files.store');
        Route::get('/', 'FileController@create')->name('account.files.create.start');
        Route::get('/{file}/create', 'FileController@create')->name('account.files.create');
    });
});
