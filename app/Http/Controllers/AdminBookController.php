<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Booking;
use App\Tempat;
use App\Package;
use Session;
use Auth;

class AdminBookController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin_users');
    }
    public function index()
    {   
        $bookings = Booking::where('konf_pembayaran', NULL)->get();
        return view('pembookingan.index')->withBookings($bookings);
    }
    public function show($id)
    {
        $bookings = Booking::find($id);
        return view('admin.show-booking')->withBookings($bookings); 
    }
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status = "Terkonfirmasi";
        $booking->save();
        Session::flash('success', 'Data pembookingan berhasil dikonfirmasi');
        return redirect()->route('adminbooking.index');
    }
    public function pembayaran(Request $request, $id){
        $booking = Booking::find($id);
        $booking->konf_pembayaran = 'Pembayaran Terkonfirmasi';
        $booking->save();
        Session::flash('success', 'Pembayaran Berhasil dikonfirmasi');
        return redirect()->route('adminbooking.show', $booking->id); 
    }
}
