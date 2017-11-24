<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;
use App\Tempat;
use App\Booking;
use Auth;
use DB;
use Session;

class BookingController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $packages = Package::all();
        $tempat = Tempat::all();
    	return view('user.booking')->withPackages($packages)->withTempats($tempat);
    }

    public function store(Request $request)
    {
        //vallidate the data
        $this->validate($request, array(
            'tempat_id' => 'required|max:255',
            'package_id' => 'required|max:255',
            'tgl_acara' => 'required|unique:bookings,tgl_acara'
        ));

        $booking = new Booking;
        $booking->tgl_acara = $request->tgl_acara;
        $tgl_sekarang = date('d-m-Y');
        $tgl2 = date('d-m-Y', strtotime('+6 days', strtotime($tgl_sekarang))); //operasi penjumlahan
        /*if ($booking->tgl_acara <= $tgl2) {
            Session::flash('success', 'Pembookingan tanggal acara harus H+7 atau lebih');
            return redirect()->route('booking.index');
        }
        else{*/
            /*store in database*/
            $booking->tgl_acara = $request->tgl_acara;
            $booking->pembooking = $request->pembooking;
            $booking->tempat_id = $request->tempat_id;
            $booking->package_id = $request->package_id;
            $booking->status = 'Pending';
            $booking->save(); #insert

            Session::flash('success', 'Anda berhasil melakukan pembookingan! tunggu konfirmasi dari admin');
            return redirect()->route('booking.status');
        /*}*/

        

    }

    public function status(){

        $name = Auth::user()->name;

        $booking = Booking::where('pembooking', $name)->get();

        return view('user.booking_status')->withBookings($booking);

    }

    public function edit($id){

        $booking = Booking::find($id);
        $tempats = Tempat::all();
        $packages = Package::all();
        return view('user.edit-booking')->withBookings($booking)->withTempats($tempats)->withPackages($packages);
    }

  
    public function update(Request $request, $id){

        //vallidate the data
        $booking = Booking::find($id);
        $this->validate($request, array(
            'tempat_id' => 'required|max:255',
            'package_id' => 'required|max:255'
        ));

        $booking->pembooking = $request->input('pembooking');
        $booking->tempat_id = $request->input('tempat_id');
        $booking->package_id = $request->input('package_id');
        $booking->tgl_acara = $request->input('tgl_acara');
        $booking->save();

        Session::flash('success', 'Data booking berhasil di edit');
        return redirect()->route('booking.status');
    }
    
    public function destroy($id){
        
        $booking = Booking::find($id);
        $booking->delete();

        Session::flash('success', 'Pembookingan berhasil dibatalkan');
        return redirect()->route('booking.status');
    }
}
