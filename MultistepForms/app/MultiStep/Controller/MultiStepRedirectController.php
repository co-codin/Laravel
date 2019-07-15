<?php

namespace App\MultiStep\Controller;

use Illuminate\Http\Request;

class MultiStepRedirectController
{
    public function __invoke(Request $request)
    {
        return redirect($request->getUri() . '/1');
    }
}
