<?php

namespace App\Http\Controllers\Admin;

use App\Models\OurVission;
use App\Models\OurMission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionVissionAdminController extends Controller
{
    
    public function OurMissionView()
    {
        return view('admin.mission-vission.mission-edit', ['content' => OurMission::first()]);
    }

    public function OurMissionStore(Request $request) {
        $mission = OurMission::first();
        if($mission){
            $mission->update($request->all());
        }else{
            OurMission::create([
                'title'   => 'Our Mission',
                'content' => 'Our mission is to reinvigorate distressed communities starting by focusing and applying our full effort by providing social services to the needy. Job placement alongside grants in forms of merit, leadership, and social advancement awards will be allocated. Garments for low-income as well as students who are in need of special aid will be provided (student graduation attire, winter clothing, etc). Through these efforts and with the help of food manufacturers, retailers, wholesalers, and government/non-profit organizations, we will bring change to our communities.'
            ]);

        }

        return back()->with('success', 'Your content update!!');
    }


    public function OurVissionView()
    {
        return view('admin.mission-vission.vission-edit', ['content' => OurVission::first()]);
    }


    public function OurVissionStore(Request $request) {
        $vission = OurVission::first();
        if($vission){
            $vission->update($request->all());
        }else{
            OurVission::create([
                'title'   => 'Our Vision',
                'content' => 'Our vision is to become a successful non-profit organization highly accessible to all members of our community. We envision a community where everyone has an opportunity to live in a safe, healthy and clean environment in regards of ethnicity and social status.'
            ]);
        }

        return back()->with('message', 'Your content update!!');
    }
}
