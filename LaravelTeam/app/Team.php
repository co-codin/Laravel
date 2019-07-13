<?php

namespace App;

use Laravel\Cashier\Billable;
use App\{User, TeamSubscription};
use Laratrust\Models\LaratrustTeam;
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
}
