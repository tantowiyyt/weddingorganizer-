<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{

    public function bookings(){
    	return $this->belongsTo('App\Booking');
    }
}
