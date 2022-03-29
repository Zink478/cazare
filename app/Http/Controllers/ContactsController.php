<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contacts()
    {
        $staffs = Staff::all();
        return view('contacts', ['staffs' => $staffs]);
    }
}
