<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use App\portofolio;
use Storage;
use Session;

class AdminPortofolio extends Controller
{
    public function index(){
    	$portofolios = new portofolio;
    	$portofolios = portofolio::all();
        return view('admin.portofolio')->withPortofolios($portofolios);
    }
    public function create(){
    	return view('admin.create-portofolio');
    }

    public function edit($id){
    	$portofolios = portofolio::find($id);
    	return view('admin.update-portofolio')->withPortofolios($portofolios);	
    } 
    public function store(Request $request){ 
    	$portofolio = new portofolio;
    	$portofolio->caption = $request->caption; 
    	if ($request->hasFile('image')) {
    		$image = $request->file('image');
    		$filename = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('portofolio_images/'. $filename);
    		Image::make($image)->resize(800, 400)->save($location);
    		$portofolio->image = $filename;    
    	}
    	$portofolio->save();
		Session::flash('success', 'Portofolio added!');    	
    	return redirect()->route('portofolio.index');
    }
    public function update(Request $request, $id){
    	$this->validate($request, array(
    		'caption' => 'required|max:255',
    		'image' => 'image'
    	));
    	$portofolio = portofolio::find($id);
    	$portofolio->caption = $request->input('caption');
    	if ($request->hasFile('image') == NULL) {
            $portofolio->save();
            Session::flash('success', 'Portofolio Updated!');
            return redirect()->route('portofolio.index');            
        }
        if ($request->hasFile('image')) {
    		//add new photo
    		$image = $request->file('image');
    		$filename = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path('portofolio_images/'. $filename);
    		Image::make($image)->resize(800, 400)->save($location);
    		$oldFilename = $portofolio->image;
    		//update the database	
    		$portofolio->image = $filename;
    		//Delete the old photo
    		Storage::delete($oldFilename);
    	}
    	$portofolio->save();
    	Session::flash('success', 'Portofolio Updated!');
    	return redirect()->route('portofolio.index');
    }
    public function destroy($id){
    	$portofolio = portofolio::find($id);
    	Storage::delete($portofolio->image);
    	$portofolio->delete();
    	return redirect()->route('portofolio.index');
    }   
}
