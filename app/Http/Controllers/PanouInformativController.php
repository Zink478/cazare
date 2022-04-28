<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Student;
use Illuminate\Http\Request;

class PanouInformativController extends Controller
{
    public function panou_informativ(){
//        $students = Student::all();
//        dd($students);

//        $full = Student::whereHas('records', function($query) use($students)
//        {
//            $query->where('IDNP', '=', 'IDNP')
//        })->get();
        $students = Student::whereNotNull('user_id')->leftjoin('applications', 'applications.IDNP', '=', 'students.IDNP')->get();

        return view('panou_informativ', ['students' => $students]);
    }
}
