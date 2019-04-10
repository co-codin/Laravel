<?php

namespace App\Listeners\Checkout;

use Mail;
use App\Events\Checkout\SaleCreated;
use App\Mail\Checkout\SaleConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToBuyer
{
    public function handle(SaleCreated $event)
    {
         Mail::to($event->sale->buyer_email)->send(new SaleConfirmation($event->sale));
    }
}
