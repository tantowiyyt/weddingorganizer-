<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;
use Image;
use Storage;

class WeddingPaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin_users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('paket.index')->withPackages($packages);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Package;
        $this->validate($request, array(
            'jenis_paket' => 'required|max:30',
            'harga' => 'required|max:11',
            'deskripsi' => 'required'
        ));
        $package->jenis_paket = $request->input('jenis_paket');
        $package->harga = $request->input('harga');
        $package->deskripsi = $request->input('deskripsi');
        $package->save();

        Session::flash('success', 'Paket Wedding berhasil di tambah!');
        return redirect()->route('paket-wedding.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages = Package::find($id);
        return view('paket.show-paket')->withPackages($packages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('paket.edit-paket')->withPackage($package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'jenis_paket' => 'required|max:30',
            'harga' => 'required|max:11',
            'deskripsi' => 'required'
        ));
        $package = Package::find($id);
        $package->jenis_paket = $request->jenis_paket;
        $package->harga = $request->harga;
        $package->deskripsi = $request->input('deskripsi');
        $package->save();

        Session::flash('success', 'Paket Wedding berhasil di update!');
        return redirect()->route('paket-wedding.show', $package->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();

        return redirect()->route('paket-wedding.index');
    }
}
