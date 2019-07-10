<?php

namespace App;

use App\User;
use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
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
}
