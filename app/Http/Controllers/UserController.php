<?php

namespace App\Http\Controllers;

use App\Mail\UserVerified;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function index()
    {
        return view('list', ['users' => User::paginate(15)]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attemptWhen($credentials, function ($user) {
            return $user->email_verified_at != null;
        })) {
            $request->session()->regenerate();

            return redirect('/ListUsers');
        } elseif (Auth::attempt($credentials)) {

            return back()->withErrors([
                'email' => 'The provided user hasn\'t been verified yet.',
            ])->onlyInput('email');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->id);
        $user->email_verified_at = now();
        $user->save();
        Mail::to($user->email)->send(new UserVerified($user));
        return view('user', ['user' => User::find($user->id)]);
    }

    public function update(Request $request, $id)
    {
        $data = array_filter($request->except(['_token', 'id']));
//        $user = User::find($request->id);
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
    }

    public function edit($id)
    {
        return view('user', ['user' => User::find($id)]);
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return redirect()->route('user.list');
    }
}
