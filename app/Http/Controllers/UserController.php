<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Mail\UserVerified;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $rules = [
        'email' => ['required', 'unique:users', 'max:50'],
        'password' => ['required', 'min:8', 'max:100'],
        'name' => ['required', 'max:50'],
        'image' => ['nullable', 'image'],
        'faculty' => ['required', 'max:50'],
        'faculty_department' => ['required', 'max:50'],
        'current_year' => ['required', 'integer'],
    ];

    public function index()
    {
        return view('user-list', ['users' => User::paginate(15)]);
    }

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
        $request->validate($this->rules);
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        if($request->image){
            $file = $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $data['image'] = $filename;

            $request->image->move(public_path('images'), $filename);

        }

        $user = User::create($data);
        $admin = User::firstWhere('role', 'admin');
        if(!is_null($admin)) {
            Mail::to($admin->email)->send(new UserRegistered($user));
        }
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
        $request->validate($this->rules);
        $data = array_filter($request->except(['_token', 'id']));
        if($data['image']){
            $file = $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $data['image'] = $filename;

            $request->image->move(public_path('images'), $filename);

        }
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
