<?php

namespace App\Services;

use App\Role;

class RolesService{
    public static function getAllRoles(){
        $allRoles = Role::all();

        return $allRoles;

    }
}
