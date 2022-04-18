<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\UserService;
use App\Services\RolesService;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserService::getAllUsers();
        // dd($users);

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RolesService::getAllRoles();
        return view('admin.users.create',['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'  => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password'  => 'required|min:8|max:255',
            'roles' => 'required'
        ]);
        // dd($validateData);
        $storeUserDetails = UserService::storeUser($validateData);

        if($storeUserDetails){
            $request->session()->flash('success','User created successfully');

            return redirect()->route('admin.users.index');
        }else{
            $request->session()->flash('error','woops, something went wrong ');

            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        // dd($user->id);

        return view('admin.users.edit',
            [
                'roles' => RolesService::getAllRoles(),
                'user'  => UserService::getUserById($user->id)
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = UserService::updateUser($request,$user->id);

        if($user){
            $request->session()->flash('success','User updated successfully');

            return redirect()->route('admin.users.index');
        }else{
            $request->session()->flash('error','woops, something went wrong ');

            return redirect()->route('admin.users.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        // dd('hi from destroy');
        $deletedUser = UserService::deleteUserById($user);

        if ($deletedUser = 1){
            $request->session()->flash('success','You have deleted the user');
            return redirect()->route('admin.users.index');
        }else{
            $request->session()->flash('error','Woops, something went wrong');

            return redirect()->route('admin.users.index');

        }
    }
}
