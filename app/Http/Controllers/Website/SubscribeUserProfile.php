<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Models\SubscribeUser;
use App\Http\Controllers\Controller;
use App\Models\PricingList;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Auth;

class SubscribeUserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct() {
    //     $this->middleware('auth:subscriber');
    // }

    public function index()
    {
        $priceLists = PricingList::orderBy('id', 'DESC')->take(5)->get();
        $user = Auth::guard('subscriber')->user();
        return view('website.subscribe-user-profile.user-profile',[
            'priceLists' => $priceLists,
            'user' => $user,
        ]);
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
        // $request->validate([
        //     'fname'            => 'required|max:32',
        //     'mname'            => 'required|max:32',
        //     'lname'            => 'required|max:32',
        //     'phone'            => 'required|max:13',
        //     'yearOfBirth'      => 'required|max:4',
        //     'email'            => 'required|string|email|max:255|unique:subscribe_users',
        //     'usa_address'      => 'required',
        //     'city'             => 'required',
        //     'state'            => 'required',
        //     'zipcode'          => 'required|integer',
        //     'country'          => 'required',
        //     'bd_address'       => 'required',
        //     'bd_upazila'       => 'required',
        //     "profile_img"      => "mimes:jpeg,jpg,png,gif",
        //     'facebook'         => 'required_if:request-type,url|nullable|url',
        //     'twitter'          => 'required_if:request-type,url|nullable|url',
        //     'other_social'     => 'required_if:request-type,url|nullable|url',
        //     'password'         => 'required|min:8',
        //     'confirm_password' => 'required_with:password|same:password|min:6',
        // ]);

        // $data = $request->all();
        // $data['password'] = bcrypt($request->password);
        // if($renewImage = $request->file('profile_img')){
        //     $file_ext        = $renewImage->getClientOriginalExtension();
        //     $imagename       = mt_rand(111, 999999).".".$file_ext;
        //     $destination     = "upload/subscribe-users";
        //     $destinationfull = "upload/subscribe-users/".$imagename;
        //     $renewImage->move($destination, $imagename);
        //     $data['profile_img'] = $destinationfull;
        // }
        // $login = SubscribeUser::create($data);

        // Auth::guard('admin')->login($login);
        return back()->with('message', 'Your account created!!');
        // return redirect(route('admin.login'))->with('message','Your account created!!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

    }
    public function update_Subscribe_Profile(Request $request){


        $data = $request->all();
        $user = Auth::guard('subscriber')->user();

        $request->validate([
            'fname'        => 'max:32',
            'mname'        => 'max:32',
            'lname'        => 'max:32',
            'phone'        => 'required|max:13',
            'yearOfBirth'  => 'required|max:4',
            'email'        => 'required|string|email|max:255|unique:subscribe_users,email,'.$user->id,
            'usa_address'  => 'required',
            'city'         => 'required',
            'state'        => 'required',
            'zipcode'      => 'required',
            'country'      => 'required',
            "profile_img"  => 'mimes:jpeg,jpg,png,gif',
            'facebook'     => 'url|nullable|url',
            'twitter'      => 'url|nullable|url',
            'other_social' => 'url|nullable|url',

        ]);

        if($request->password){
            // $this->validate($request,[
            //     'password'         => 'required|min:6',
            //     'confirm_password' => 'required_with:password|same:password|min:6',
            // ]);


            if (Hash::check($request->current_pass, $user->password)){
                // The password match
                $user->password = bcrypt($request->password);
                session()->flash('message','Password hass been changed!!');
            }else{
                session()->flash('error','Your current password dont match !!');

            }
        }

        $data['password'] = bcrypt($request->password);
        if($renewImage = $request->file('profile_img')){
            if (File::exists($user->profile_img)) {
                File::delete($user->profile_img);
            }
            $file_ext        = $renewImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999).".".$file_ext;
            $destination     = "upload/subscribe-users";
            $destinationfull = "upload/subscribe-users/".$imagename;
            $renewImage->move($destination, $imagename);
            $data['profile_img'] = $destinationfull;
        }

        $user->update($data);
        session()->flash('message','Your profile updated!!');
        return back();

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
