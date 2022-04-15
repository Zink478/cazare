<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('admin.adminimport');
    }
//    public function upload(Request $request)
//    {
////        $file = $request->file('file');
////
////        $destinationPath = 'uploads';
////        $file->move($destinationPath,$file->getClientOriginalName());
//////        $finalDestination = $destinationPath.$file;
//////        dd($finalDestination)
////        Excel::import(new StudentsImport, request()->file($file));
////        return back();
//
//        Excel::import(new StudentsImport, $request->file('file'));
////        Excel::import(new StudentsImport, $request->file);
//        return redirect(route('student.upload'));
//    }
}
