<?php

use App\User;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $users = User::flush();
});
