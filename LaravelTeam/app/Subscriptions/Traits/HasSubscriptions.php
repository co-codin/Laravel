<?php

namespace App\Subscriptions\Traits;

trait HasSubscriptions
{
    public function hasSubscription()
    {
        return $this->subscribed('main');
    }
}
