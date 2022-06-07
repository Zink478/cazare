<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\Post\MessagePostRequest;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(MessagePostRequest $request)
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->firstOrFail();
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'user_id' => $user->id
        ]);
        broadcast(new MessageSent($user, $message));
        return ['status' => 'Message Sent!'];
    }
}
