<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\Post\MessagePostRequest;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class ChatsController extends Controller
{
    //Add the below functions
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

//    public function fetchMessages()
//    {
//        return Message::with('user')->get();
//    }

    public function sendMessage(MessagePostRequest $request)
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->firstOrFail();
        $roomNumber = $request->roomNumber;
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'user_id' => $user->id,
            'roomNumber' => $roomNumber
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json($message);
    }

    public function getMessages()
    {
        $student = Student::where('user_id', auth()->user()->id)->firstOrFail();
        $roomNumber = $student->application->roomNumber;
        $messages = Message::with('user')->where('roomNumber', $roomNumber)->get();
        if($messages->isEmpty())
        {
            $created = Message::create(
                [
                    'user_id' => 1,
                    'message' => 'Bine ati venit in camera '.$roomNumber,
                    'roomNumber' => $roomNumber
                ]
            );
        }
        $messages = Message::with('user')->where('roomNumber', $roomNumber)->get();
        return Message::with('user')->where('roomNumber', $roomNumber)->get();
    }
}
