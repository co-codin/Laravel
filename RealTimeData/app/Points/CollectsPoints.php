<?php

namespace App\Points;

use App\Points\Models\Point;

trait CollectsPoints
{
    public function givePoints($point)
    {
        $this->points()->attach($point->getModel());
    }

    public function points()
    {
        return $this->belongsToMany(Point::class)->withTimestamps();
    }
}
