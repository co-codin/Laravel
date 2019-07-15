<?php

namespace App\Http\Controllers\Auth\Register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterControllerStep2 extends Controller
{
    public function index()
    {
        return view('auth.register.2');
    }
}
