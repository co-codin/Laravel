<?php

namespace App\Points;

use App\Points\Models\Point;

trait CollectsPoints
{
    public function givePoints($point)
    {
        $model = Point::whereKey($point->key())->first();

        $this->points()->attach($model);
    }

    public function points()
    {
        return $this->belongsToMany(Point::class)->withTimestamps();
    }
}
