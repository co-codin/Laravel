<?php

namespace App\MultiStep\Routing;

use Illuminate\Support\Facades\Route;

class PendingMultiStepRegistration
{
    protected $uri;

    protected $controller;

    protected $steps;

    protected $name;

    public function __construct($uri, $controller)
    {
        $this->uri = $uri;
        $this->controller = $controller;
    }

    public function steps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    public function __destruct()
    {

    }
}
