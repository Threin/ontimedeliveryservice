<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CountUserService;
use App\Services\PermitsService;
use App\Services\RidersService;
use App\User;

class AdminController extends Controller
{
    //
    public function index(){
        $usersCount = CountUserService::countUsers();
        $users = User::all();
        // $usersCount = count($users);

        $permitsCount = PermitsService::countPermits();

        $countRiders = RidersService::countAllRiders();

        return view('admin.dashboard.index',compact('permitsCount','usersCount','countRiders'));
    }
}
