<?php

namespace App\Services;
use App\Permit;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Cache;

class PermitsService{

   public static function countPermits(){
        // $permits = Permit::all();
        $countPermits = Permit::select('id')->get()->count();
        // ->where('permit_status','Delivered')->get();

        // $countPermits = count($permits);

        return $countPermits;
   }

   public static function getPermits(){
       $permits = Permit::all();

       return $permits;
   }

   public static function countDeliveredPermits(){

    $countDeliveredPermits = Permit::select('id')
        ->where('permit_status','Delivered')->get()->count();


    return $countDeliveredPermits;


    }

   public static function getAllPermits_pending(){

    $permits = Permit::where('permit_status','Pending')->paginate(100);

    return $permits;
   }

   public static function getAllPermits_printed(){
    $permits = Permit::where('permit_status','Printed')->paginate(100);

    return $permits;
   }

   public static function getAllPermits_forPrinting(){
    $permits = Permit::where('permit_status','For Printing')->paginate(100);

    return $permits;
   }

   public static function getAllPermits_inTransit(){
    $permits = Permit::where('permit_status','In-Transit')->paginate(100);

    return $permits;
   }

   public static function getAllPermits_delivered(){
    $permits = Permit::where('permit_status','Delivered')->paginate(100);

    return $permits;
   }


   public static function update_forPrinting($request){
        // dd($request->id);
        // foreach($request as $data){
        //     $permit = Permit::whereIn('permit_bin',$data)
        //     ->update('permit_status','For Printing');
        // }

        // return $permit;

        // $str_arr = explode(',',$request->id);
        // dd($request->id);

        $permit = Permit::whereIn('permit_bin',$request->id)
            ->update(['permit_status' => 'For Printing']);

        return $permit;
   }

   public static function remove_forPrintingById($data){
    //    dd($data->id);
        $permit = Permit::where('id',$data->id)
        ->update(['permit_status' => 'Pending']);

        return $permit;
   }

   public static function getAllSelectedPermits($data)
   {
    //    dd($data);
        $permits = Permit::where('permit_status','For Printing')->get();

        return $permits;
   }

   public static function update_PermitAsPrinted($data){
    //    dd($data);
    $permit = Permit::where('permit_bin',$data)
    ->update(['permit_status' => 'Printed']);

    return $permit;
   }

   public static function printPreviewById($id){

        $permit = Permit::where('permit_bin',$id)->get();

        // dd($permit);

        return $permit;

   }


}
