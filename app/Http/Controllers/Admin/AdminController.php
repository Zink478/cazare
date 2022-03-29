<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $students = Student::all();

        $edited = \request()->query('edited');
        return view('admin.adminhome', ['students' => $students, 'edited' => $edited]);
    }
    public function delete($id)
    {
        $student = Student::where('id', $id)->firstorfail()->delete();
        return redirect('admin');
    }
}
