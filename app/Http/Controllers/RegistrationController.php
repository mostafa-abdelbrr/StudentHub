<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registration');
    }

    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
//        echo $data;
        $user = User::create($data);
        $admin = User::firstWhere('role', 'admin');
        Mail::to($admin->email)->send(new UserRegistered($user));
    }

}
