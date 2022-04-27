<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
//        $students = Student::all()->join('applications.IDNP', 'students.IDNP');

        $students = DB::table('students')
            ->leftjoin('applications', 'applications.IDNP', '=' , 'students.IDNP')
            ->get();
        return view('pdf', ['students' => $students]);
    }

    public function export()
    {
        $students = Student::orderBy('surname')->get();

        $pdf = PDF::loadView('pdfraw', compact('students'));

        return $pdf->download('invoice.pdf');
    }
}
