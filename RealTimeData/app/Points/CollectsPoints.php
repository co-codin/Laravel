<?php

namespace App\Points;

use Exception;
use App\Points\Models\Point;
use App\Points\Actions\ActionAbstract;

trait CollectsPoints
{
    public function givePoints(ActionAbstract $action)
    {
        if (!$model = $action->getModel()) {
            throw new Exception("Points model for key [{$action->key()}] not found.");
        }

        $this->points()->attach($model);
    }

    public function points()
    {
        return $this->belongsToMany(Point::class)->withTimestamps();
    }
}
