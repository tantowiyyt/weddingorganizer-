<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran2 extends Model
{
    protected $table = 'pembayarans2';

     public function bookings(){
    	return $this->belongsTo('App\Booking');
    }

}
