<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
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

            return redirect('/list');
        }
        elseif (Auth::attempt($credentials)) {

            return back()->withErrors([
                'email' => 'The provided user hasn\'t been verified yet.',
            ])->onlyInput('email');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
