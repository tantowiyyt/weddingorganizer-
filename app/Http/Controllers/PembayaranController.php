<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Pembayaran;
use Image;
use Session;
use Storage;

class PembayaranController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
	
    public function index($id){

    	$booking = Booking::find($id);
    	return view('pembayaran.index')->withBookings($booking);
    }

    public function store(Request $request, $booking_id){

    	
    	$this->validate($request, array(
            'cicil1' => 'required|max:25',
            'image' => 'image'
        ));

        $booking = Booking::find($booking_id);

    	$pembayaran = new Pembayaran;

    	$pembayaran->cicil1 = $request->cicil1;
    	if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('pembayaran/'. $filename);
            Image::make($image)->resize(150, 200)->save($location);

            $pembayaran->bukti1 = $filename;    
        }
    	$pembayaran->tgl1 = date('j M Y');
    	$pembayaran->bookings()->associate($booking);

    	$pembayaran->save();

    	Session::flash('success', 'Cicilan Pertama Berhasil di Kirimkan!');
    	
    	return redirect()->route('booking.status');
    }

    public function edit($id){

        $pembayaran = Pembayaran::find($id);
        return view('pembayaran.edit-pembayaran1')->withPembayaran($pembayaran); 
    }


    public function update(Request $request, $id){

        $pembayaran = Pembayaran::find($id);
        
        $this->validate($request, array(
            'cicil1' => 'required|max:25',
            'image' => 'image'
        ));

        
        $pembayaran->cicil1 = $request->cicil1;
        if ($request->hasFile('image') == NULL) {
            $pembayaran->save();
            Session::flash('success', 'Cicilan 1 berhasil diedit!');
            return redirect()->route('pembayaran.index', $pembayaran->bookings->id);
        }
        if ($request->hasFile('image')) {
            //add new photo
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('pembayaran/'. $filename);
            Image::make($image)->resize(150, 200)->save($location);
            $oldFilename = $pembayaran->bukti1;
            //Delete the old photo
            Storage::delete($oldFilename);
            //update the database   
            $pembayaran->bukti1 = $filename;
        }

        $pembayaran->save();
        Session::flash('success', 'Cicilan 1 berhasil diedit!');
        return redirect()->route('pembayaran.index', $pembayaran->bookings->id);

    }

    public function cetak($id){

        $booking = Booking::find($id);
        return view('pembayaran.cetak')->withBooking($booking);

    }

   
}
