<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class CazareController extends Controller
{
    public function cazare()
    {
        $roomType1 = Room::where('roomType', 1)->orderBy('roomLocation')->get();
        $roomType2 = Room::where('roomType', 2)->orderBy('roomLocation')->get();
        $roomType3 = Room::where('roomType', 3)->orderBy('roomLocation')->get();

        return view('cazare', [
            'roomType1' => $roomType1 ,
            'roomType2' => $roomType2 ,
            'roomType3' => $roomType3
        ]);
    }
    public function max($roomNumber)
    {
        $records = Record::where('roomNumber', $roomNumber)->count();
        dd($records);
    }
}
