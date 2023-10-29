<?php

namespace App\Http\Controllers\Admin;

use App\Models\PrintAndNews;
use Illuminate\Http\Request;
use App\Models\PrintNewsCategory;
use App\Http\Controllers\Controller;

class PrintAndNewsController extends Controller {
    public function printAndNews() {
        $print_and_news_data = PrintAndNews::orderBy('id', 'DESC')->get();
		$printMeidaCategories = PrintNewsCategory::orderBy('id','DESC')->get();
        return view('admin.print-and-news.index', compact('print_and_news_data','printMeidaCategories'));
    }

    public function printAndNewsStore(Request $request) {
        $request->validate([
            'image' => 'required',
            'link'  => 'required',
            'printnewscategory_id'  => 'required',
        ]);

        if ($request->image) {
            $coverPhoto   = $request->image;
            $getExt       = $coverPhoto->getClientOriginalExtension();
            $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
            $destination  = 'upload/print-and-news/';
            $image        = $destination . $modifiedName;
            $coverPhoto->move($destination, $modifiedName);
            PrintAndNews::create([
                'image' => $image,
                'link'  => $request->link,
                'printnewscategory_id'  => $request->printnewscategory_id,
            ]);
        } else {
            PrintAndNews::create([
                'link' => $request->link,
            ]);
        }
        return back()->with('message', 'Data Inserted');
    }

    public function printAndNewsEdit($id) {
        $print_and_news_data = PrintAndNews::find($id);
		$printMeidaCategories = PrintNewsCategory::orderBy('id', 'DESC')->get();

        if ($print_and_news_data) {
            return view('admin.print-and-news.edit', compact('print_and_news_data', 'printMeidaCategories'));
        } else {
            return back()->with('error', 'Data Not Found');
        }

    }

    public function printAndNewsUpdate(Request $request, $id) {
        $dataExistance = PrintAndNews::find($id);
        if ($dataExistance) {
            if ($request->image) {
                if ($dataExistance->image != '' && $dataExistance->image != null) {
                    $file_old = base_path() . '/' . $dataExistance->image;
                    //$file_old = public_path().'/'.$dataExistance->image;
                    unlink($file_old);
                }
                $coverPhoto   = $request->image;
                $getExt       = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
                $destination  = 'upload/print-and-news/';
                $image        = $destination . $modifiedName;
                $coverPhoto->move($destination, $modifiedName);
                $dataExistance->update([
                    'image' => $image,
                    'link'  => $request->link,
					'printnewscategory_id'  => $request->printnewscategory_id,
                ]);
            } else {
                $dataExistance->update([
                    'link' => $request->link,
					'printnewscategory_id'  => $request->printnewscategory_id,
                ]);
            }
        } else {
            return back()->with('error', 'Data Not Found');
        }
        return redirect(route('admin.print-and-media-news'))->with('message', 'Data Updated');
    }

    public function printAndNewsDestroy($id) {
        $dataExistance = PrintAndNews::find($id);
        if ($dataExistance) {
            if ($dataExistance->image != '' && $dataExistance->image != null) {
                $file_old = base_path() . '/' . $dataExistance->image;
                //$file_old = public_path().'/'.$dataExistance->image;
                unlink($file_old);
            }
            $dataExistance->delete();
            return back()->with('message', 'Data Deleted');
        } else {
            return back()->with('error', 'Data Not Found');
        }
    }
}
