<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{

    public function imageUpload()
    {
        $success = null;
        $fileName = null;

        if (\Session::has('success')) {
            $success = \Session::get('success');
        }

        if (\Session::has('path')) {
            $fileName = \Session::get('path');
        }


        return view('example.uploadForm', compact('success', 'fileName'));
    }

    public function doImageUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);

        return back()
            ->with('success', 'Image Uploaded successfully.')
            ->with('path', $imageName);

    }
}
