<?php

namespace App\Http\Controllers;


use App\Http\Requests\Post\StorePostRequestApplication;
use App\Models\Application;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function index($roomNumber)
    {
//        $room = DB::table('rooms')->where('roomNumber', $roomNumber)->first();
        $room = Room::where('roomNumber', $roomNumber)->first();
        $student = Student::where('user_id', auth()->user()->id)->first();
        $appExists = NULL;
        $approved = NULL;
        if($student) {
            $appExists = Application::where('IDNP', $student->IDNP)->first();
            $approved = Application::where('IDNP', $student->IDNP)->where('status', 1)->first();
        }
        else
        {
            $appExists = NULL;
        }
        return view('roomapplication', ['room' => $room, 'student' => $student, 'appExists' => $appExists ,'approved' => $approved]);
    }

    public function save(StorePostRequestApplication $request)
    {

        $request->validated();
        if($request->checkBox == 'on')
        {
            $student = DB::table('students')->where('user_id', auth()->user()->id)->first(); // profilul studentului actual
            if($request->IDNP == $student->IDNP) { // verificam daca a introdus IDNP'ul propriu
                $record = Application::where('IDNP', $request->IDNP)->first(); // Cautam daca cerera a fost depusa vreodata
                    if(!isset($record)) { // Daca nu exista cererea
                        $created = Application::create(
                            [
                                'IDNP' => $request->IDNP,
                                'roomNumber' => $request->roomNumber,
                                'status' => 0
                            ]);
                        Mail::send('emails.newApplication',$created->toArray(),
                            function($message)
                            {
                                $message->to('oliver.harvey15@gmail.com', 'CodeOnline')
                                    ->subject('New Application!');
                            }); // Notificare adminului despre cerere noua
                        return redirect()->back();
                    }
                    else { return redirect()->back(); } // Daca exista cererea
            }
            else{
                return redirect()->back(); // Daca a introdus IDNP gresit
            }
        }
        else if($request->checkBox =='off') // Daca nu e deacord cu termenii si conditiile
        {
            return redirect()->back();
        }
    }

    public function delete($IDNP)
    {
        $record = Application::where('IDNP', $IDNP)->firstOrFail()->delete();

        return redirect()->back();
    }
}
