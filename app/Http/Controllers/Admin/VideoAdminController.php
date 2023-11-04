<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class VideoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id','DESC')->paginate(30);
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video_category = VideoCategory::all();
        return view('admin.video.create', compact('video_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->slug = Str::slug($request->title) . '-' . uniqid();
        $video->title = $request->title;
        $video->video_categories_id = $request->category_id;
        $video->youtube_id = $request->youtube_id;
        $video->description = $request->description;
        $video->status = $request->status;
        $video->feature = $request->feature;
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $file_ext  = $image->getClientOriginalExtension();
            $imageName = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/video-thumbnail/";
            $image->move($destination, $imageName);
            $video->thumbnail = $imageName;
        }

        $video->save();
        return back()->with('message', 'Video Added Successfully!');
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
    public function edit(Video $video)
    {
        $data['video_category'] = VideoCategory::all();
        $data['video'] = $video;
        return view('admin.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video->title = $request->title;
        $video->video_categories_id = $request->category_id;
        $video->youtube_id = $request->youtube_id;
        $video->description = $request->description;
        $video->status = $request->status;
        if ($slider = $request->file('thumbnail')) {
            $destination     = "upload/video-thumbnail/";
            if (isset($video->thumbnail)) {
                if (File::exists($destination . '/' . $video->thumbnail)) {
                    File::delete($destination . '/' . $video->thumbnail);
                }
            }

            $file_ext        = $slider->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $slider->move($destination, $imagename);
            $video->thumbnail = $imagename;
        }
        $video->save();
        return back()->with('message', 'Video Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('message', 'Video Deleted Successfully!');
    }
}
