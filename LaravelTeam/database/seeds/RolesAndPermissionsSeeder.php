<?php

use App\Permission;
use App\Role;
use App\Teams\Roles;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Roles::$roles;

        foreach ($roles as $role => $data) {

        }
    }
}