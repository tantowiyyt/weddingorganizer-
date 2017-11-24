<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\portofolio; // Connect to Portofolio Model
use App\about;
use App\Package;
use App\cara;
class WebController extends Controller
{
    public function index(){

    	$portofolio = Portofolio::orderBy('id', 'desc')->paginate(12);

    	return view('pages.main')->withPortofolios($portofolio);
    }

    public function tentang_kami(){

    	$tentang = about::all();
    	return view('pages.tentang')->withTentangs($tentang);

    }

    public function paket(){
    	return view('pages.paket');
    }
    public function getPaketId($id){
    	$paket = Package::find($id);
    	return view('pages.show-paket')->withPaket($paket);
    }

    public function cara(){
        $cara = Cara::all();
        return view('pages.cara')->withCara($cara); 
    }
}
