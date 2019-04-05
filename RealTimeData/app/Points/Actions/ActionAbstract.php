<?php

namespace App\Points\Actions;

use App\Points\Models\Point;

abstract class ActionAbstract
{
    abstract public function key();

    public function getModel()
    {
        return Point::where('key', $this->key())->first();
    }
}
