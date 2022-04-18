<?php
namespace App\Services;

use App\User;

class UserService
{
    public static function getAllUsers(){
        $users = User::all();

        return $users;
    }

    public static function getUserById($data){
        $user = User::findOrFail($data);

        return $user;
    }

    public static function deleteUserById($id){
        // dd($id->id);
        $user = User::destroy($id->id);

        return $user;
    }

    public static function storeUser($data){
        // dd($data['roles']);

        $user = User::create(collect($data)->except(['_token','roles'])->toArray());
        // dd($user);

        $user->roles()->sync($data['roles']);
        return($user);
    }

    public static function updateUser($fromRequest, $data){
        // dd($fromRequest);
        $user = self::getUserById($data);

        // dd($user);
        $user->update($fromRequest->except(['_token','roles']));
        // dd($user);

        $user->roles()->sync($fromRequest->roles);
        return($user);
    }

    public static function deletUserById(){

    }
}
