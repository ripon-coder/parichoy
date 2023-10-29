<?php

namespace App\Http\Controllers\Subscribe\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function __construct()
    {
        $this->middleware('guest:subscriber');
    }

     public function broker()
    {
        return Password::broker('subscribers');
    }

    public function showLinkRequestForm()
    {
        return view('subscribe-login.auth.passwords.email');
    }

}
