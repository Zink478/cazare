<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\Room;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CazareController extends Controller
{
    public function index()
    {
//        $recordsIdnps = Record::all()->pluck('IDNP')->toArray();
//        $students = Student::whereNotIn('IDNP', $recordsIdnps);
//        dd($students->get());
        $students = Student::whereDoesntHave('records')->get();
//        $student->records()->create(['roomNumber' => $roomNumber]);

        $rooms = Room::all();

//        $full = Record::join('students', 'IDNP', '=', 'IDNP')->get();
//        dd($full);
    //        $full = DB::table('students')->join('records', '=', 'rooms.IDNP')->get();
    //  dd($full);

        $success = \request()->query('success');
        $full = DB::table('students')
            ->join('records', 'records.IDNP', '=', 'students.IDNP')
            ->join('rooms', 'rooms.roomNumber', '=', 'records.roomNumber')
            ->get();

        return view('admin.admincazare', ['students' => $students, 'rooms' => $rooms, 'full' => $full,
            'success' => $success]);
    }


}
