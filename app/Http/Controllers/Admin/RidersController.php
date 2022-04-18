<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RidersService;
use Illuminate\Http\Request;

class RidersController extends Controller
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
        $riders = RidersService::getAllRiders();

        return view('admin.riders.index',compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $riders = RidersService::getAllRiders();
        return view('admin.riders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $riderData = $request->validate([
        //     'rider_name'  => 'required|max:255',
        //     'rider_email' => 'required|max:255|unique:users',
        //     'rider_password'  => 'required|min:8|max:255'
        // ]);

        $storeRiderDetails = RidersService::storeRider($request);

        if($storeRiderDetails){
            $request->session()->flash('success','Rider created successfully');

            return redirect()->route('admin.riders.index');
        }else{
            $request->session()->flash('error','woops, something went wrong ');

            return redirect()->route('admin.riders.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rider = RidersService::getRiderById($id);

        return view('admin.riders.edit',['rider' => $rider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rider = RidersService::updateRider($request,$id);

        if($rider){
            $request->session()->flash('success','Rider updated successfully');

            return redirect()->route('admin.riders.index');
        }else{
            $request->session()->flash('error','woops, something went wrong ');

            return redirect()->route('admin.riders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd('hello');

        $rider = RidersService::deletRiderById($id);

        if(!$rider){
            $request->session()->flash('error','Woops, something went wrong. Please contact your administrator');
            return redirect()->route('admin.riders.index');
        }else{
            $request->session()->flash('success','Account was deleted successfully');
            return redirect()->route('admin.riders.index');

        }


    }
}
