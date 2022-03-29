<?php

namespace App\Http\Controllers;
use App\Models\Home;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
    return view('home');
    }
    public function about(){
        return view('about');
    }

    public function check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'min:5'
        ]);
        $home = new Home;
        $home->email = $request->input('email');
        $home->subject = $request->input('subject');
        $home->semnatura = $request->input('semnatura');

        $home->save();

        return redirect()->route('home');
    }
}
