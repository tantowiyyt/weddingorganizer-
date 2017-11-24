<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\cara;
use Session;
class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin_users');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where('konf_pembayaran', 'Pembayaran Terkonfirmasi')
                    ->orderBy('updated_at', 'asc')->get();
        return view('admin.admin-home')->withBookings($bookings);
    }

    public function jadwalWedding(){
        $bookings = Booking::where('konf_pembayaran', 'Pembayaran Terkonfirmasi')
                    ->orderBy('updated_at', 'asc')->get();
        return view('admin.jadwal-wedding')->withBookings($bookings);
    }

    public function caraBooking(){
        $cara = cara::all();
        return view('admin.carabooking-index')->withCara($cara);
    }

    public function caraBookingEdit($id){
        $cara = cara::find($id);
        return view('admin.carabooking-edit')->withCara($cara);
    }

    public function caraBookingUpdate(Request $request, $id){
        $this->validate($request, array(
            'cara' => 'required'
        ));

        $cara = cara::find($id);
        $cara->cara = $request->input('cara');
        $cara->save();

        Session::flash('success', 'Cara Booking berhasil di Edit');
        return redirect()->route('cara.index');
    }
}
