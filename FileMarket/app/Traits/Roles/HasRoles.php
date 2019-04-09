<?php

namespace App\Traits\Roles;

use App\Role;

trait HasRoles
{
    public function hasRole($role)
    {
        if (!$this->roles->contains('name', $role)) {
            return false;
        }

        return true;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
}
