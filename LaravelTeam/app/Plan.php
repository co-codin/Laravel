<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, Builder};

class Plan extends Model
{
    public function scopeTeams(Builder $builder)
    {
        return $builder->where('teams', true);
    }
}
