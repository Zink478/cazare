<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::whereNotNull('id');


        $group = $request->group;
        $name = $request->name;

            if(isset($group)) {
                $students->where('group', $group);
            }
            elseif(isset($name))
            {
                $students->where('surname', $name);
            }

        $students = $students->get();

        $edited = \request()->query('edited');
        $users = DB::table('students')->join('users', 'users.id', '=', 'students.user_id', 'right outer')
            ->get();

        $groups = Student::whereNotNull('group')->distinct('group')->pluck('group')->toArray();
        return view('admin.adminhome', ['students' => $students, 'edited' => $edited, 'users' => $users,
            'groups' => $groups]);
    }
    public function delete($id)
    {
        $student = Student::where('id', $id)->firstorfail()->delete();
        return redirect('admin');
    }
}
