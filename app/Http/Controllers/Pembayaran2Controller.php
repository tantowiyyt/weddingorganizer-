<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran2;
use Image;
use Session;
use Storage;
use App\Booking;

class Pembayaran2Controller extends Controller
{
	public function __construct(){

		$this->middleware('auth');
	}

    public function index($id){

    	$booking = Booking::find($id);

    	return view('pembayaran.index2')->withBookings($booking);
    }

    public function store(Request $request, $booking_id){

    	/*dd($request);*/
    	$this->validate($request, array(
            'nominal' => 'required|max:25',
            'image' => 'image'
        ));

        $booking = Booking::find($booking_id);

    	$pembayaran2 = new Pembayaran2;

    	$pembayaran2->cicil2 = $request->nominal;

    	if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('pembayaran/'. $filename);
            Image::make($image)->resize(150, 200)->save($location);

            $pembayaran2->bukti2 = $filename;    
        }
        
    	$pembayaran2->bookings()->associate($booking);

        $tgl = date('j M Y');
        $pembayaran2->tgl2 = date('j M Y', strtotime($tgl));
    	$pembayaran2->save();

    	Session::flash('success', 'Cicilan Kedua Berhasil di Kirimkan!');
    	
    	return redirect()->route('booking.status');
    }

    public function edit($id){

        $pembayaran2 = Pembayaran2::find($id);
        return view('pembayaran.edit-pembayaran2')->withPembayaran2($pembayaran2); 
    }

    public function update(Request $request, $id){

        $pembayaran2 = Pembayaran2::find($id);
        
        $this->validate($request, array(
            'cicil2' => 'required|max:25',
            'image' => 'image'
        ));

        
        $pembayaran2->cicil2 = $request->cicil2;
        if ($request->hasFile('image') == NULL) {
            $pembayaran2->save();
            Session::flash('success', 'Cicilan 2 berhasil diedit!');
            return redirect()->route('pembayaran2.index', $pembayaran2->bookings->id);
        }
        if ($request->hasFile('image')) {
            //add new photo
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('pembayaran/'. $filename);
            Image::make($image)->resize(150, 200)->save($location);
            $oldFilename = $pembayaran2->bukti2;
            //Delete the old photo
            Storage::delete($oldFilename);
            //update the database   
            $pembayaran2->bukti2 = $filename;
        }

        $pembayaran2->save();
        Session::flash('success', 'Cicilan 2 berhasil diedit!');
        return redirect()->route('pembayaran2.index', $pembayaran2->bookings->id);

    }

}
