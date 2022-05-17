<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $filename = time() . "-ws." . $request->file('image')->getClientOriginalExtension();
        // prx($filename);
        // echo $request->file('image')->store('uploads');
        echo $request->file('image')->storeAs('public/uploads',$filename);
    }
}
