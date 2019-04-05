<?php

use App\User;
use App\Points\Actions\SolvedTopic;

Route::get('/', function () {
    $user = User::find(1);

    $user->givePoints(new SolvedTopic());

    dd($user->points());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
