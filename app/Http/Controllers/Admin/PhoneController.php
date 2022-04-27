<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class PhoneController extends Controller
{
    public function index()
    {
        Nexmo::message()->send(
            [
                'to' => '37369086168',
                'from' => 'sender',
                'text' => 'test sms'
            ]
        );
        echo "Message sent!";
    }

    public function send(Request $request)
    {
        $sender = 'UTM';
        $message = $request->get('message');
        $student = Student::where('IDNP', $request->get('idnp'))->firstOrFail();
        Nexmo::message()->send(
            [
                'to' => '373'.$student->phone,
                'from' => $sender,
                'text' => $message
            ]
        );
        return redirect()->back();
    }

}
