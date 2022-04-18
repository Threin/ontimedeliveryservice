<?php

namespace App\Services;
use App\User;

 class CountUserService{
    public static function countUsers(){
        $users = User::all();
        $usersCount = count($users);

        return $usersCount;
    }
}