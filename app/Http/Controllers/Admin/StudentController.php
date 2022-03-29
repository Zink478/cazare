<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Student;
use Illuminate\Http\Request;

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
            'group' => $request->group
        ]);
        return redirect('admin');
    }

    public function edit(Student $student)
    {
        $students = Student::all();
        return view('admin.adminhome', ['students' => $students, 'editStudent' => $student]);
    }

    public function update(StorePostRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect(route('adminhome', ['edited' => true]) );
    }


}
