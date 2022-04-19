<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Imports\StudentsImport;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $student = Student::create([
            'IDNP' => $request->IDNP,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'group' => $request->group,
            'user_id' => $request->user_id
        ]);
        return redirect('admin');
    }

    public function edit(Student $student)
    {
        $students = Student::all();
        $search = 1;
        $users = User::where('role', User::ROLE_USER)->get();

//        $users = DB::table('students')->whereNot(function ($query)
//        {
//            $query->where('role', User::ROLE_USER)->from('users');
//        })->get();

//        $users = User::where('role', User::ROLE_USER)->
//            Student::pluck('user_id')->all();

//        $users = User::has('id')->get(); !!!!!!!!!!!!!!!!!!!!!!!!!! <<<<<<<<<<<<<<< WHEREDOESNT HAVE (LAST)
//                      + FORM POST ROOMCARDINFO!
//        dd($users);
        return view('admin.adminhome', ['students' => $students, 'editStudent' => $student, 'users' => $users,
            'search' => $search]);
    }

    public function update(StorePostRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect(route('adminhome', ['edited' => true]) );
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import()
    {
        Excel::import(new StudentsImport, 'C:\Users\Dragos\Downloads\students.xlsx');
        return redirect(route('adminhome'))->with('success', 'All good!');
    }

    public function importFile(Request $request)
    {
        Excel::import(new StudentsImport, $request->file);
        return redirect(route('student.upload'));
    }
}
