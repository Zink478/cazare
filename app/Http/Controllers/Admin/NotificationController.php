<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function index()
    {
        $students = Student::whereNotNull('user_id')->get('user_id');
        $emails = [];
        foreach($students as $student)
        {
            $user_id = $student->user_id;
            $user = User::where('id', $user_id)->get('email')->toArray();
            array_push($emails, $user);
        }

        $studentsForSms = Student::all();
        return view('admin.adminnotifications', ['students' => $students, 'emails' => $emails, 'studentsForSms' => $studentsForSms]);
//        return view('admin.adminnotifications');
    }
    public function emailAll()
    {
        $students = Student::whereNotNull('user_id')->get('user_id');
        $count = Student::whereNotNull('user_id')->get('user_id')->count(); // nr de studenti cu user_id => deci cu email
        $emails = []; // initializare, lista cu toate emailurile
//        foreach($students as $student)
//        {
//            $user_id = $student->user_id;
//            $user = User::where('id', $user_id)->get('email')->toArray();
//
//            Mail::send('emails.notifyAll',$students->toArray(),
//                function($message) use ($user)
//                {
//                    $message->to($user[0]['email'], 'Email pentru toti')
//                        ->subject('New message!');
//                });
//            array_push($emails, $user); // De trimis prin array
        // }
        foreach($students as $student)
        {
            $user_id = $student->user_id;
            $user = User::where('id', $user_id)->get('email')->toArray();
            array_push($emails, $user); // lista cu toate emailurile
        }
//        for (i=0; i<=)

        Mail::send('emails.notifyAll', [],
            function($message) use ($emails)
            {
                $message->to($emails[0][0]['email'])->bcc($emails[1][0]['email'], 'name')->subject('New message!');
//                $message->to($emails[0][0]['email'])->bcc($emails, 'bcc name')->subject('Salutare');
            });

//        Mail::send('emails.notifyAll', )
//        $string = implode(' ', $emails);
//        dd($emails);
        return redirect()->back();
    }
}
