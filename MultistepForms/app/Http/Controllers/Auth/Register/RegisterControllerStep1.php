<?php

namespace App\Http\Controllers\Auth\Register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterControllerStep1 extends Controller
{
    public function index()
    {
        return view('auth.register.1');
    }
}
