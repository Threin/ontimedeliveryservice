<?php

namespace App\Services;

use App\Rider;

Class RidersService{
    public static function getAllRiders(){
        $riders = Rider::all();

        return $riders;
    }

    public static function getRiderById($id){
        $rider = Rider::findOrFail($id);

        return $rider;
    }

    public static function countAllRiders(){
        $riders = Rider::all();
        $countRiders = count($riders);

        return $countRiders;

    }

    public static function updateRider($fromRequest, $data){
        $isActive = '';
        $rider = self::getRiderById($data);


        if(!$rider->rider_isActive){
            $isActive = 'no';
        }else{
            $isActive = 'yes';
        }
            $rider->update([
                'rider_name' => $fromRequest->rider_name,
                'rider_contactNumber' => $fromRequest->rider_contactNumber,
                'rider_address' => $fromRequest->rider_address,
                'rider_email' => $fromRequest->rider_email,
                'rider_isActive' => $isActive,
            ]);



        // $rider->roles()->sync($fromRequest->roles);
        return($rider);
    }

    public static function storeRider($data){
        // dd('hello from storeRider');
        // dd($data);
        $isActive = '';

        $rider = new Rider;
        if(!$data->isActive){

            $isActive = 'no';

        }else{
            $isActive = 'yes';

        }


        $rider->rider_name = $data->rider_name;
        $rider->rider_contactNumber = $data->rider_contactNumber;
        $rider->rider_address = $data->rider_address;
        $rider->rider_email = $data->rider_email;
        $rider->rider_password = $data->rider_password;
        $rider->rider_status = 'available';
        $rider->rider_isActive = $isActive;

        $rider->save();
        return($rider);
    }

    public static function deletRiderById($id){
        $deletedRider = Rider::destroy($id);

        // dd($deletedRider);
        return $deletedRider;
    }
}
