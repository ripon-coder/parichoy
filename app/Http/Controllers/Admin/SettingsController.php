<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SubscriberImage;
use App\Http\Controllers\Controller;
use File;

class SettingsController extends Controller
{
    public function deleteJunks(){
        $junkImages = SubscriberImage::where('status', 0)->get();
        if(count($junkImages) > 0){
            foreach($junkImages as $key => $junk){
                if($junk->profile_img != ''  && $junk->profile_img != null)
                $old_file = $junk->profile_img;
                if(file_exists($old_file)){
                    File::delete($old_file);
                }
            }
        }
        $junkImages = SubscriberImage::where('status', 0)->delete();
        return back()->with('message', 'Junk Files Deleted');
    }
}
