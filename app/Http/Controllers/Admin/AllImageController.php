<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\AllImage;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\FacebookVideo;
use App\Http\Controllers\Controller;

class AllImageController extends Controller {
    public function index() {
        // $allImageData = AllImage::get();
        // return view('admin.all-image.index')->with('all_image_data',$allImageData);
        //$photo_gallery_data = PhotoGallery::orderBy('id', 'DESC')->paginate(12);
        $photo_gallery_data = PhotoGallery::orderBy('id', 'DESC')->get();
        return view('admin.photo-gallery.index')->with('photo_gallery_data', $photo_gallery_data);
    }

    public function store(Request $request) {
        $request->validate([
            "image_url"   => "required|array",
            "image_url.*" => "mimes:jpeg,jpg,png,gif|required",
        ]);
        if ($request->image_url) {
            foreach ($request->image_url as $key => $image) {
                $coverPhoto   = $request->image_url[$key];
                $getExt       = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
                $destination  = 'upload/all-image/';
                $image_url    = $destination . $modifiedName;
                $coverPhoto->move($destination, $modifiedName);
                AllImage::create([
                    'image_url' => $image_url,
                ]);
            }
        }
        return back()->with('message', 'Image Uploaded');
    }

    public function destroy($id) {
        $imageData = AllImage::find($id);
        if ($imageData) {
            if ($imageData->image_url != '' && $imageData->image_url != null) {
                $file_old = base_path() . '/' . $imageData->image_url;
                //$file_old = public_path().'/'.$imageData->image_url;
                unlink($file_old);
            }
            $imageData->delete();
            return back()->with('message', 'Image Deleted');
        } else {
            return back()->with('error', 'Image Not Found');
        }
    }

    public function photoGallery() {
        $photoGalleryData = PhotoGallery::orderBy('created_at', 'DESC')->paginate(24);
        return view('admin.photo-gallery.index')->with('photo_gallery_data', $photoGalleryData);
    }

    public function photoGalleryStore(Request $request) {
        $request->validate([
            "title"       => "required",
            "image_url"   => "required|array",
            "image_url.*" => "mimes:jpeg,jpg,png,gif|required",
        ]);
        if ($request->image_url) {
            foreach ($request->image_url as $key => $image) {
                $coverPhoto   = $request->image_url[$key];
                $getExt       = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
                $destination  = 'upload/photo-gallery/';
                $image_url    = $destination . $modifiedName;
                $coverPhoto->move($destination, $modifiedName);
                PhotoGallery::create([
                    'title'     => $request->title,
                    'image_url' => $image_url,
                ]);
            }
        }
        return back()->with('message', 'Data Inserted');
    }

    public function photoGalleryEdit($id) {
        $photoGallery = PhotoGallery::find($id);
        return view('admin.photo-gallery.edit', compact('photoGallery'));
    }

    public function photoGalleryUpdate(Request $request, $id) {
        $request->validate([
            'title'     => 'required',
            "image_url" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoGallery = PhotoGallery::find($id);
        $data         = $request->all();

        if ($image = $request->file('image_url')) {
            if (File::exists($photoGallery->image_url)) {
                File::delete($photoGallery->image_url);
            }

            $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'upload/photo-gallery/';
            $fullPath        = $destinationPath . $imageExt;
            $image->move($destinationPath, $imageExt);
            $data['image_url'] = $fullPath;
        }

        $photoGallery->update($data);

        return redirect(route('admin.photo-gallery'))->with('message', 'Gallery image updated!!');
    }

    // Photo Gallery Image search
    public function gallery_Image_Search(Request $request) {
        if ($request->ajax()) {
            $keyword = $request->get('keyword');

            // if (!empty($keyword)) {

            //     $image = PhotoGallery::where('title', 'LIKE', '%' . $keyword . '%')->first();
            //     return view('admin.photo-gallery.load-search-photo', compact('image'))->render();
            // } else {
            //     $photo_gallery_data = PhotoGallery::orderBy('id', 'DESC')->get();
            //     return view('admin.photo-gallery.index')->with('photo_gallery_data', $photo_gallery_data);
            // }

            if (!empty($keyword)) {
                $photo_gallery_data = PhotoGallery::where('title', 'LIKE', '%' . $keyword . '%')->get();
            } else {
                $photo_gallery_data = PhotoGallery::orderBy('id', 'DESC')->get();
            }

            return view('admin.photo-gallery.load-search-photo', compact('photo_gallery_data'))->render();

        }
    }

    public function photoGalleryDestroy($id) {
        $imageData = PhotoGallery::find($id);
        if ($imageData) {
            if ($imageData->image_url != '' && $imageData->image_url != null) {
                $file_old = base_path() . '/' . $imageData->image_url;
                //$file_old = public_path().'/'.$imageData->image_url;
                unlink($file_old);
            }
            $imageData->delete();
            return back()->with('message', 'Image Deleted');
        } else {
            return back()->with('error', 'Image Not Found');
        }
    }

    // Gallery image Attribute
    public function deletePhotos(Request $request) {
        if ($request->ajax()) {
            $galleryimage = PhotoGallery::where(['id' => $request->galleryId])->first();
            if ($galleryimage) {
                if (File::exists($galleryimage->image_url)) {
                    File::delete($galleryimage->image_url);
                }
            }
            $galleryimage->delete();
            return response()->json("Gallery image has been deleted !!");
        }
    }

    public function photoGalleryReorder(Request $request) {
        if ($request->update == true) {
            foreach ($request->positions as $position) {
                $imagePosition = $position[0];
                $newPosition   = $position[1];

                PhotoGallery::where('id', $imagePosition)->update([
                    'id'       => $imagePosition,
                    'position' => $newPosition,
                ]);
            }

            session()->flash('message', 'Your possiotion has been updated!!');
            exit();
        }

    }

    public function videoGallery(Request $request) {
        $videoGalleryData = VideoGallery::paginate(21);

        if ($request->ajax()) {
            return $request->all();

            $view = view('admin.video-gallery.load-more-video', compact('videoGalleryData'))->render();
            return response()->json(['html' => $view]);
        }

        return view('admin.video-gallery.index')->with('video_gallery_data', $videoGalleryData);
    }

    public function videoGalleryStore(Request $request) {
        $request->validate([
            "video_url" => "required",
        ]);
        foreach ($request->video_url as $key => $video) {
            VideoGallery::create([
                'video_url' => $video,
            ]);
        }
        return back()->with('message', 'Video Uploaded');
    }

    public function videoGalleryEdit($id) {
        $videoGallery = VideoGallery::find($id);
        return view('admin.video-gallery.edit', compact('videoGallery'));
    }

    public function videoGalleryUpdate(Request $request, $id) {
        VideoGallery::find($id)->update([
            'video_url' => $request->video_url,
        ]);

        return back()->with('message', 'Video Updated');
    }

    // Gallery image Attribute
    public function videoGalleryDestroy(Request $request) {
        if ($request->ajax()) {
            $videoDelete = VideoGallery::where(['id' => $request->videiId])->first();
            $videoDelete->delete();
            return response()->json("Video has been deleted !!");
        }
    }






    public function facebookVideo() {
        $facebookVideo = FacebookVideo::first();
        if ( $facebookVideo ) {
            return view('admin.facebook-video.edit', compact('facebookVideo'));
        }else{
            return view('admin.facebook-video.edit');
        }
    }

    public function AddfacebookVideo(Request $request) {
        $request->validate([
            "video_url" => "required |numeric",
        ]);

        $facebookVideo = FacebookVideo::first();
        if( $facebookVideo ){
            $facebookVideo->update( $request->all());
            $message = 'Facebook video updated!!';
        }else{
            FacebookVideo::create( $request->all());
            $message = 'Facebook video inserted!!';
        }

        return back()->with('message', $message);

    }

}
