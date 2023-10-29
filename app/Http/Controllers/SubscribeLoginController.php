<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\SubscribeUser;
use App\Http\Controllers\Controller;

class SubscribeLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:subscriber', ['except' => ['logout']]);
    }

    public function showLoginForm() {
        return view('subscribe-login.auth.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);


        $subscribeUser = SubscribeUser::where([
            'email' => $request->email,
            'status'   => 0
        ])->first();

        if($subscribeUser){
            return redirect()->back()->withErrors('Sorry are not activited!!');
        }else{
            if (Auth::guard('subscriber')->attempt(['email'=> $request->email, 'password'=> $request->password, 'status'=> true], $request->remember)) {
                return redirect()->intended(route('subscribe-user-profile.index'));
            }else{
                $request->session()->flash('error', 'Your crediantial is miss match');
                return redirect()->back()->withInput($request->only('email', 'remember'));
            }
        }


    }

    public function logout() {
        Auth::guard('subscriber')->logout();
        return redirect('/');
    }
}
