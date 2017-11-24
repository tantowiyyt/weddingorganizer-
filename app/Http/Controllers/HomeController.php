<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name = Auth::user()->name;
        $jadwal = Booking::where('status', 'Terkonfirmasi')
                  ->orderBy('tgl_acara', 'asc')->get();  
        $bookings = Booking::where('pembooking', $name)->where('status', 'Terkonfirmasi')->get();
        return view('user.home')->withBookings($bookings)->withJadwals($jadwal);
    }
}
