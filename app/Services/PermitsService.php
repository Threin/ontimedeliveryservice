<?php

namespace App\Services;
use App\Permit;


class PermitsService{

   public static function countPermits(){
        $permits = Permit::all();

        $countPermits = count($permits);

        return $countPermits;
   }

   public static function getPermits(){
       $permits = Permit::all();

       return $permits;
   }

   public static function getAllPermits_pending(){
    $permits = Permit::all()
    ->where('permit_status','Pending');

    return $permits;
   }
   public static function getAllPermits_printed(){
    $permits = Permit::all()
    ->where('permit_status','Printed');

    return $permits;
   }

   public static function getAllPermits_forPrinting(){
    $permits = Permit::all()
    ->where('permit_status','For Printing');

    return $permits;
   }

   public static function getAllPermits_inTransit(){
    $permits = Permit::all()
    ->where('permit_status','In-Transit');

    return $permits;
   }

   public static function getAllPermits_delivered(){
    $permits = Permit::all()
    ->where('permit_status','Delievered');

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
