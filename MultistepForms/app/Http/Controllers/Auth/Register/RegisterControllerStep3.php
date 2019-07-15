<?php

namespace App\Http\Controllers\Auth\Register;

use App\MultiStep\Steps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterControllerStep3 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('auth.register', 3);

        if ($step->notCompleted(1, 2)) {
            return redirect()->route('auth.register.2.index');
        }

        return view('auth.register.3');
    }

    public function store(Steps $steps, Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $steps->step('auth.register', 3)
            ->store($request->only('password'))
            ->complete();

        // dump($steps->data());

        $steps->clearAll();
    }
}
