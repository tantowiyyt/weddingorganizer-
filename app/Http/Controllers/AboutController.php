<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\about;
use Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = new about;

        $about = about::all();

        return view('admin.admintentang')->withabouts($about); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        // find the post in the database and save as variable
        $about = about::find($id);
        // return the view and pass in the var we previously created
        return view('admin.admintentang-edit')->withabouts($about); 
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
        // Validate the data
        $about = about::find($id);
       
        
        $this->validate($request, array(
            'tentang' => 'required|max:1000',
                
        ));
        

        // Save data to the database
        $about = about::find($id);

        $about->tentang = $request->input('tentang');
        

        $about->save(); 
        // set flash data with success message
        Session::flash('success', 'Tentang was successfully updated!');

        //redirect with flash data to posts.show
        return redirect()->route('admintentang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
