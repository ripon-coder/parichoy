<?php

namespace App\Http\Controllers\Website;

use App\Models\Post;
use App\Models\Video;
use App\Models\Category;
use App\Models\HomepageAd;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FacebookVideo;
use App\Models\ArchivePrintVersion;
use App\Http\Controllers\Controller;
use App\Models\VideoCategory;

class VideoController extends Controller
{
    public function index()
    {
         $data['video_category'] = VideoCategory::with(['video'=>function($query){
            $query->orderBy('id', 'DESC');
        }])->whereHas('video', function ($query) {
            $query->where('status', 1);
        })->where('status', 1)->get();
        
        $data['slider'] = Video::where('feature',true)->latest()->limit(10)->get();
        

        return view('website.video.index', $data);
    }
    public function MoreVideo(VideoCategory $category)
    {
        $data['category'] = $category;
        $data['video'] = Video::where('video_categories_id', $category->id)->latest()->paginate(20);
        return view('website.video.more-video', $data);
    }
}
