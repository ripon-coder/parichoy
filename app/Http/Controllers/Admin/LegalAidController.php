<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\LegalAid;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalAidController extends Controller
{
    
    public function index(){
    	$posts = LegalAid::get();
    	return view('admin.legal-aid.index')->with('posts', $posts);
    }

    public function create(){
    	$postCategory = PostCategory::get();
    	return view('admin.legal-aid.create')->with('post_category', $postCategory);
    }

    public function store(Request $request){

        $data = $request->all();
    	$request->validate([
    		'title'              => 'required',
    		'description'        => 'required',
    		'status'             => 'required|in:0,1',
    		"image"              => "mimes:jpeg,jpg,png,gif|required",
    	]);

        if ($legalAid = $request->file('image')) {
            $imageExtension  = $legalAid->getClientOriginalExtension();
            $imagename       = uniqid() . "." . $imageExtension;
            $destination     = "upload/legal-aid/";
            $destinationFull = $destination . $imagename;
            $legalAid->move($destination, $imagename);
            $data['image'] = $destinationFull;
        }
    	$data['slug'] = Str::slug($request->title.'-'.uniqid());
    
        LegalAid::create($data);

    	return back()->with('message','Legal Aid Inserted');
    }


    public function edit($id){
        $postData = LegalAid::where('id', $id)->first();
        return view('admin.legal-aid.edit')->with('post_data', $postData);
    }

    public function update(Request $request, $id){

        $legal = LegalAid::find($id);
        $data = $request->all();
        $request->validate([
            'title'           => 'required',
            'description'     => 'required',
            'status'          => 'required',
            "image"           => "mimes:jpeg,jpg,png,gif",
        ]);

        if ($legalAid = $request->file('image')) {
            if (File::exists($legal->cover)) {
                File::delete($legal->cover);
            }
            $imageExtension  = $legalAid->getClientOriginalExtension();
            $imagename       = uniqid() . "." . $imageExtension;
            $destination     = "upload/legal-aid/";
            $destinationFull = $destination . $imagename;
            $legalAid->move($destination, $imagename);
            $data['image'] = $destinationFull;
        }

        $data['slug'] = Str::slug($request->title.'-'.uniqid());
        $legal->update($data);

        return back()->with('message','Legal Aid Updated');
    }

    public function destroy($id){
        $legal = LegalAid::find($id);
        if($legal->delete()){
            if (File::exists($legal->cover)) {
                File::delete($legal->cover);
            }
        }
        return back()->with('message','Legal Aid Deleted');
    }
}
