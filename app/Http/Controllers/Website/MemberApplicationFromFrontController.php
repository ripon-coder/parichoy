<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberApplicationFromFrontController extends Controller {
    public function index() {
        // $priceLists = PricingList::orderBy('id', 'DESC')->take(5)->get();
        // return view('website.membership-application-from', ['priceLists' => $priceLists]);
        return view('website.application.application-page');
    }

    public function applicationSendMessage(Request $request) {
        $request->validate([
            'business_name'      => 'required',
            'owner_name'      => 'required',
            'phone'           => 'required',
            'email'           => 'required|email',
            'address'         => 'required',
            'state'           => 'required',
            'zipcode'         => 'required',
            'business_nature' => 'required',
            'experience'      => 'required|numeric',
            // 'profile_img' => "mimes:jpeg,jpg,png,gif|required",
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->queue(new ApplicationMail($request->all()));

        return back()->with('message', 'Your mail send !!');
    }
}
