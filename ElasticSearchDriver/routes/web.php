<?php

use App\User;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $users = User::search($request->q)->get();

    dd($users);
});
