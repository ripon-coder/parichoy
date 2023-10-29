<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchivePrintVersion;
use Illuminate\Http\Request;
use File;

class ArchivePrintVersionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $archivPrintVersions = ArchivePrintVersion::orderBy('id', 'DESC')->get();
        return view('admin.archive-print-version.index', compact('archivPrintVersions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.archive-print-version.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            "title" => "required",
            "image" => "mimes:jpeg,jpg,png,gif|required",
            "file"  => "mimes:pdf|required",
        ]);

        $data = $request->all();
        if ($printVersionImage = $request->file('image')) {
            $file_ext        = $printVersionImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/print-version/";
            $destinationfull = $destination . $imagename;
            $printVersionImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        if ($printVersionFile = $request->file('file')) {
            $file_ext        = $printVersionFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/members/";
            $destinationfull = $destination . $imagename;
            $printVersionFile->move($destination, $imagename);
            $data['file'] = $destinationfull;
        }

        ArchivePrintVersion::create($data);
        return back()->with('message', 'Archive Print Version Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $printVersion = ArchivePrintVersion::find($id);
        return view('admin.archive-print-version.edit', compact('printVersion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            "title" => "required",
            "image" => "mimes:jpeg,jpg,png,gif",
            "file"  => "mimes:pdf",
        ]);

        $data = $request->all();
        $printVersion = ArchivePrintVersion::find($id);

        if ($printVersionImage = $request->file('image')) {
            if (File::exists($printVersion->image)) {
                File::delete($printVersion->image);
            }
            $file_ext        = $printVersionImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/print-version/";
            $destinationfull = $destination . $imagename;
            $printVersionImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        if ($printVersionFile = $request->file('file')) {

            if (File::exists($printVersion->file)) {
                File::delete($printVersion->file);
            }
            $file_ext        = $printVersionFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/members/";
            $destinationfull = $destination . $imagename;
            $printVersionFile->move($destination, $imagename);
            $data['file'] = $destinationfull;
        }

        $printVersion->update($data);
        return redirect(route('admin.archive-print-versions.index'))->with('message', 'Archive Print Version Created!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $printVersion = FomerCommittee::find($id);

        if ($printVersion->delete()) {
            if (File::exists($printVersion->image)) {
                File::delete($printVersion->image);
            }

            if (File::exists($printVersion->file)) {
                File::delete($printVersion->file);
            }
        }
        return back('message', 'Archive Print Version Deleted');
    }
}
