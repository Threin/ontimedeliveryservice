<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $table='riders';
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rider_name', 'rider_contactNumber','rider_address','rider_status','rider_isActive','rider_email', 'rider_password',
    ];
}
