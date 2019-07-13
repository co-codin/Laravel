<?php

namespace App;

use Laravel\Cashier\Billable;
use Laratrust\Models\LaratrustTeam;
use App\{User, TeamSubscription, Plan};
use App\Subscriptions\Traits\HasSubscriptions;

class Team extends LaratrustTeam
{
    use Billable, HasSubscriptions;

    protected $fillable = [
        'name'
    ];

    public function ownedBy(User $user)
    {
        return $this->users->find($user)->hasRole('team_admin');
    }

    public function ownedByCurrentUser()
    {
        return $this->ownedBy(auth()->user());
    }

    public function plan()
    {
        
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withTimestamps();
    }

    public function subscriptions()
    {
        return $this->hasMany(TeamSubscription::class, $this->getForeignKey())
            ->orderBy('created_at', 'desc');
    }

    public function plans()
    {
        return $this->hasManyThrough(Plan::class, TeamSubscription::class, 'team_id', 'provider_id', 'id', 'stripe_plan')
                    ->orderBy('team_subscriptions.created_at', 'desc');
    }
}
