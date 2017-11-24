<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
    	return view('pages.login');
    }

    public function register(){
    	return view('pages.daftar');
    }
    public function loggedin(){
    	return view('user.homeuser');
    }
}
