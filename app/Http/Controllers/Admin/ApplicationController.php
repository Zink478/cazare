<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('admin.adminapplications', ['applications' => $applications]);
    }

    public function accept($IDNP)
    {
        $updated = Application::where('IDNP', $IDNP)->update(['status' => 1]);
        $application = Application::where('IDNP', $IDNP)->get()->toArray();

        $user = Student::where('IDNP', $IDNP)->get('user_id');
        $user_id = $user->toArray();
        $email = User::where('id', $user_id)->get('email')->toArray();

        Mail::send('emails.applicationResponse', $application[0],
        function($message) use ($email)
        {
            $message->to($email[0]['email'], 'Test')
                ->subject('Cererea ta a fost revizuita!');
        });
        return redirect()->back();
    }
    public function decline($IDNP)
    {
        $user = Student::where('IDNP', $IDNP)->get('user_id');
        $user_id = $user->toArray();
        $updated = Application::where('IDNP', $IDNP)->update(['status' => 2]);
        $application = Application::where('IDNP', $IDNP)->get()->toArray();
        $email = User::where('id', $user_id)->get('email')->toArray();

        Mail::send('emails.applicationResponse', $application[0],
            function($message) use ($email)
            {
                $message->to($email[0]['email'], 'Test')
                    ->subject('Cererea ta a fost revizuita!');
            });
        return redirect()->back();
    }
}
