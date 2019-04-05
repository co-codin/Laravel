<?php

namespace App\Points;

use Exception;
use App\Points\Models\Point;
use App\Points\Events\PointsGiven;
use App\Points\Actions\ActionAbstract;
use App\Points\Formatters\PointsFormatter;

trait CollectsPoints
{
    public function givePoints(ActionAbstract $action)
    {
        if (!$model = $action->getModel()) {
            throw new Exception("Points model for key [{$action->key()}] not found.");
        }

        $this->pointsRelation()->attach($model);

        event(new PointsGiven($this, $model));
    }

    public function points()
    {
        return new PointsFormatter(
            $this->pointsRelation->sum('points')
        );
    }

    public function pointsRelation()
    {
        return $this->belongsToMany(Point::class)->withTimestamps();
    }
}
