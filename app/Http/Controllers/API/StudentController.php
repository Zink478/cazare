<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show($idnp)
    {
        $student = Student::where('IDNP', $idnp)->firstOrFail();
        if(!empty($student))
        {
            return response()->json($student);
        }
        else
        {
            return response()->json(
                [
                    "message" => "Studentul nu exista in BD!"
                ], 404);
        }
    }

    public function update(Request $request, $idnp)
    {
        if(Student::where('IDNP', $idnp)->exists())
        {
            $student = Student::where('IDNP', $idnp)->firstOrFail();
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->surname = is_null($request->surname) ? $student->surname : $request->surname;
            $student->phone = is_null($request->phone) ? $student->phone : $request->phone;
            $student->IDNP = is_null($request->IDNP) ? $student->IDNP : $request->IDNP;
            $student->group = is_null($request->group) ? $student->group : $request->group;
            $student->user_id = is_null($request->user_id) ? $student->user_id : $request->user_id;
            $student->save();
            return response()->json(
                [
                    "message" => "Informatia studentului a fost actualizata"
                ], 200);
        }
        else
        {
            return response()->json(
                [
                    "message" => "Studentul nu a fost gasit!"
                    ], 404);
        }
    }

    public function destroy($idnp)
    {
        if(Student::where('IDNP', $idnp)->exists())
        {
            $student = Student::where('IDNP', $idnp)->firstOrFail();
            $student->delete();
            return response()->json([ "message" => "Studentul a fost sters din BD"], 200);
        }
        else{
            return response()->json([
                    "message" => "Studentul nu a fost gasit in BD"
            ], 404);
        }
    }

}
