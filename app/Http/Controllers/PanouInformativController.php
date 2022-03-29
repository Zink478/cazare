<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class PanouInformativController extends Controller
{
    public function panou_informativ(){
        $students = Student::all();
        return view('panou_informativ', ['students' => $students]);
    }
}
