<?php

namespace App\Http\Controllers\Website;

use App\Models\State;
use App\Models\PricingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterPlanFrontController extends Controller
{
    public function Index(){

        $priceLists = PricingList::orderBy('id', 'DESC')->take(5)->get();
        return view('website.register-plan.register-plan')->with('priceLists', $priceLists);
    }

    public function RegisterForm(Request $request){
        $request->validate([
            'plan' => 'required|min:0',
        ]);
        return view('website.register-plan.subscription-register-form', [
            'plan' => $request->plan,
            'states' => State::get(),
        ]);

    }
}
