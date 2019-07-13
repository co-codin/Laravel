<?php

namespace App;

use Laravel\Cashier\Billable;
use App\{User, TeamSubscription};
use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    use Billable;

    protected $fillable = [
        'name'
    ];

    public function hasSubscription()
    {
        return false;
    }

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
