<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\about;
class AdminWebController extends Controller
{
    public function index(){

    	$about = new about;

    	$about = about::all();

    	return view('admin.web')->withabouts($about); 
    
    }

}
