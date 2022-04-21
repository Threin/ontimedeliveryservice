<?php

namespace App\Http\Controllers;

use App\Services\PermitsService;
use Illuminate\Http\Request;

class PermitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permits = PermitsService::getAllPermits_pending();

        return view('shared.permits.index',compact('permits'));
    }

    public function selectedPermitsForPrinting(Request $request){
        // dd($request->id);
        if($request->id){
            $permits = PermitsService::update_forPrinting($request);
            return redirect()->route('permits.for-printing');

        }else{
            $request->session()->flash('error','No record selected, please select a record for printing');

            return redirect()->route('permits');


        }

        // dd($permits);


    }

    public function getAllForPrinting(){
        $permits = PermitsService::getAllPermits_forPrinting();

        return view('shared.permits.forPrinting',compact('permits'));
    }

    public function getAllPrinted(){
        $permits = PermitsService::getAllPermits_printed();

        return view('shared.permits.printedPermits',compact('permits'));
    }
    // InTransit Permits
    public function getAllInTransit(){
        $permits = PermitsService::getAllPermits_inTransit();

        return view('shared.permits.inTransit',compact('permits'));
    }



    // Delivered Permits
    public function getAllDelivered(){
        $permits = PermitsService::getAllPermits_delivered();

        return view('shared.permits.delivered',compact('permits'));
    }


    public function removePermitForPrinting(Request $request){

        // dd($request);
        $permit = PermitsService::remove_forPrintingById($request);

        $request->session()->flash('success','Successfully removing the selected permits from printing');

        return redirect()->route('permits.for-printing');
    }

    public function markPermitPrinted(Request $request){
        // dd($request->id);
        if(!$request->id){
            $request->session()->flash('error','Please select permit to mark as printed');
            return redirect()->route('permits.for-printing');

        }else{

            $permits = PermitsService::update_PermitAsPrinted($request->id);
            $request->session()->flash('success','Selected permits successfully updated');

            return redirect()->route('permits.for-printing');

        }
    }

    public function printPreview(Request $request)
    {
        $permits = PermitsService::getAllSelectedPermits($request);

        return view('shared.permits.printpreview',compact('permits'));
    }

    public function printPreviewById($id){
        $permits = PermitsService::printPreviewById($id);

        if(!$permits){
            $request->session()->flash('error','Please select permit to be printed');
            return redirect()->route('permits.for-printing');
        }else{
            return view('shared.permits.printpreview',compact('permits'));

        }
    }


    public function seachPermit(Request $request){
        $q = $request->searchInput;
        // dd($q);

        $permits = PermitsService::searchPermit($q);
        if($q == null){
            $request->session()->flash('error','No Details found. Try to search again !');
        // return view('shared.permits.index',compact('permits'));

            return redirect()->route('permits');
        }
        if(count($permits)>0){
            return view('shared.permits.index',compact('permits','q'));
            // return redirect()->route('permits',['permits' => $permits]);
        }else{
            $request->session()->flash('warning','No Details found. Try to search again !');

            return redirect()->route('permits');
        }






    }
}
