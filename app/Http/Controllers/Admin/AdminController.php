<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return redirect(route('admin.dashboard'));

    }

    public function profileEdit($id){
    	return view('auth.edit-profile');
    }

    public function profileUpdate(Request $request, $id){
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required|unique:users,id,'.$id,
    		'password' => 'nullable',
    		'password_confirmation' => 'same:password',
    		'image' => 'nullable|mimes:jpg,png,jpeg,gif',
    	]);
    	if($request->password && $request->image){
    		if(Hash::check($request->old_password, Auth::user()->password)){
    			if(Auth::user()->image != ''  && Auth::user()->image != null){
	               $file_old = base_path().'/'.Auth::user()->image;
	               //$file_old = public_path().'/'.$imageExistance->image;
	               unlink($file_old);
	            }
    			$coverPhoto = $request->image;
	            $getExt = $coverPhoto->getClientOriginalExtension();
	            $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
	            $destination ='upload/admin-image/';
	            $image = $destination.$modifiedName;
	            $coverPhoto->move( $destination ,$modifiedName );

	    		User::find($id)->update([
	    			'name' => $request->name,
	    			'email' => $request->email,
	    			'password' => bcrypt($request->password),
	    			'image' => $image,
	    		]);
    		}else{
    			return back()->with('error', 'Old Password Not Matched');
    		}
    	}else if($request->password){
    		if(Hash::check($request->old_password, Auth::user()->password)){
    			User::find($id)->update([
	    			'name' => $request->name,
	    			'email' => $request->email,
	    			'password' => bcrypt($request->password),
	    		]);
    		}else{
    			return back()->with('error', 'Old Password Not Matched');
    		}
    	}else if($request->image){
    		if(Auth::user()->image != ''  && Auth::user()->image != null){
               $file_old = base_path().'/'.Auth::user()->image;
               //$file_old = public_path().'/'.$imageExistance->image;
               unlink($file_old);
            }
    		$coverPhoto = $request->image;
            $getExt = $coverPhoto->getClientOriginalExtension();
            $modifiedName = 'img_'.time().'_'.uniqid().'.'.$getExt;
            $destination ='upload/admin-image/';
            $image = $destination.$modifiedName;
            $coverPhoto->move( $destination ,$modifiedName );

    		User::find($id)->update([
    			'name' => $request->name,
    			'email' => $request->email,
    			'image' => $image,
    		]);
    	}else{
    		User::find($id)->update([
    			'name' => $request->name,
    			'email' => $request->email,
    		]);
    	}

    	return back()->with('message', 'Admin Info Updated');
    }
}
