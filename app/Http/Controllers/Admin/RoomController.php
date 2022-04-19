<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $roomType1 = Room::where('roomType', 1)->orderBy('roomLocation')->get();
        $roomType2 = Room::where('roomType', 2)->orderBy('roomLocation')->get();
        $roomType3 = Room::where('roomType', 3)->orderBy('roomLocation')->get();

        return view('admin.admincamere', [
            'roomType1' => $roomType1 ,
            'roomType2' => $roomType2 ,
            'roomType3' => $roomType3
        ]);
    }
    public function info($id)
    {
//        $students = Record::join('students', 'records.IDNP', '=', 'students.IDNP')
//            ->join('rooms', 'rooms.roomNumber' , '=', 'records.roomNumber')
//            ->where('records.roomNumber', $id)->get();

        $students = Room::join('records', 'rooms.roomNumber' , '=', 'records.roomNumber')
            ->join('students', 'records.IDNP', '=', 'students.IDNP')
            ->where('records.roomNumber', $id)->get();
        $room = Room::where('roomNumber', $id)->firstOrFail();

        return view('admin.admin-roominfo', ['students' => $students, 'room' => $room]);
    }
}