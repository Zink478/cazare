<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\StorePostRequestAvatar;
use App\Http\Requests\Profile\SaveProfile;
use App\Http\Requests\Profile\UpdateProfile;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentProfileController extends Controller
{
    public function index()
    {
//        $profile = auth()->user()->student;
//        dd($profile);

//        $profile = DB::table('students')->where('user_id', auth()->user()->id)->get();
        $profile = Student::where('user_id', auth()->user()->id)->first();
        $user = User::where('id', auth()->user()->id)->first();
        return view('auth.profile', [
            'profile' => $profile,
            'user' => $user
        ]);
    }

    public function update(UpdateProfile $request)
    {
        $profile = Student::where('user_id', auth()->user()->id)->first();
        if(!(isset($profile)))
        {
            return redirect()->back();
        }
        else {
            $data = $request->validated();


            $created = Student::where('user_id', auth()->user()->id)->update(['phone' => $request->phone, 'IDNP' => $request->IDNP]);

            return redirect(route('profile'));
        }
    }

    public function save(StorePostRequest $request)
    {
//        dd($request);
//        $test = Student::where('user_id', auth()->user())->get();
//        if ((auth()->user()->student)) {
//            $edited = 1;
//            return redirect(route('profile', ['edited' => $edited]));
//        }



        $data = $request->validated();


//        $created = auth()->user()->student()->create($data);

        $created = Student::create(
            [
                'IDNP' => $request->IDNP,
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
                'group' => $request->group,
                'user_id' => auth()->user()->id
            ]
        );

        return redirect(route('profile'));

    }

//    public function saveavatar(StorePostRequestAvatar $request)
//    {
//
//        $name = $request->file('image')->getClientOriginalName();
//        $path = $request->file('image')->store('public/images');
//
//        $user = User::where('id', auth()->user()->id)->firstOrFail();
//        $user->avatar = $path;
//        $user->save();
//
//        return redirect()->back();
//    }
}
