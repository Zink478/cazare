<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Profile\SaveProfile;
use App\Http\Requests\Profile\UpdateProfile;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->student;

        return view('auth.profile', [
            'profile' => $profile
        ]);
    }

    public function update(UpdateProfile $request)
    {
        if (!(auth()->user()->student)) {
            die('Create your profile1');
        }
        $data = $request->validated();

        $created = auth()->user()->student()->update($data);

        return redirect(route('profile'));
    }

    public function save(StorePostRequest $request)
    {
        if (auth()->user()->student) {
            $edited = 1;
            return redirect(route('profile', ['edited' => $edited]));
        }

        $data = $request->validated();

        $created = auth()->user()->student()->create($data);


        return redirect(route('profile'));

    }

}
