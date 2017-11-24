<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
	protected $table = 'tempats';
    public function bookings(){
    	return $this->hasOne('App\Booking');
    }
}
