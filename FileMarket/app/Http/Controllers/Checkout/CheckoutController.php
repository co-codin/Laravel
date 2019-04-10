<?php

namespace App\Http\Controllers\Checkout;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\FreeCheckoutRequest;

class CheckoutController extends Controller
{
    public function free(File $file, FreeCheckoutRequest $request)
    {
        if (!$file->isFree()) {
            return back();
        }

        return back()->withSuccess('We\'ve emailed your download link to you.');
    }

    public function payment()
    {

    }
}
