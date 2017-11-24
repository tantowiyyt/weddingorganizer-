<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $table = 'bookings';

    public function tempats(){
    	return $this->belongsTo('App\Tempat', 'tempat_id');
    }

    public function packages(){
    	return $this->belongsTo('App\Package', 'package_id');
    }

    public function pembayarans(){
    	return $this->hasOne('App\Pembayaran', 'bookings_id');
    }

    public function pembayarans2(){
        return $this->hasOne('App\Pembayaran2', 'bookings_id');
    }
	 
}
