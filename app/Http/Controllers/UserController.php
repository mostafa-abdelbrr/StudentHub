<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Mail\UserVerified;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check()){
            return redirect()->route('home');
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attemptWhen($credentials, function ($user) {
            return $user->email_verified_at != null;
        })) {
            $request->session()->regenerate();

            return redirect()->route('home');
        } elseif (Auth::attempt($credentials)) {

            return back()->withErrors([
                'email' => 'The provided user hasn\'t been verified yet.',
            ])->onlyInput('email');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function verify($id)
    {
        $user = User::find($id);
        $user->email_verified_at = now();
        $user->save();
        Mail::to($user->email)->send(new UserVerified($user));
        return view('user-edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        if($request->email == Auth::User()->email){
            $request->validate([
                'password' => ['required', 'min:8', 'max:100'],
                'name' => ['required', 'max:50'],
                'image' => ['nullable', 'image'],
                'faculty' => ['required', 'max:50'],
                'faculty_department' => ['required', 'max:50'],
                'current_year' => ['required', 'integer'],
            ]);
        }
        else {
            $request->validate($this->rules);
        }
        $data = array_filter($request->except(['_token']));
        if($request->image){
            $file = $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $data['image'] = $filename;

            $request->image->move(public_path('images'), $filename);

        }
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
        return redirect()->route('user.list');
    }

    public function edit($id)
    {
        return view('user-edit', ['user' => User::find($id)]);
    }

    public function profile()
    {
        return view('user-profile', ['user' => Auth::User()]);
    }

    public function edit_profile()
    {
        return view('user-edit', ['user' => Auth::User()]);
    }

    public function profile_update(Request $request) {
        return $this->update($request, Auth::id());
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('user.list');
    }

    public function edit_password() {
        return view('password-change');
    }

    public function update_password(Request $request){
        $request->validate([
            'old_password' => ['required', 'min:8', 'max:100', 'current_password'],
            'new_password' => ['required', 'min:8', 'max:100', 'confirmed'],
        ]);
        $user = User::find(Auth::id());
        $data = $request->except('_token');
        $user->password = Hash::make($request->new_password);
        $user->save();

    }

    public function signin() {
        return view('login');
    }

    public function logout(Request $request)
    {
        if(Auth::check()){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        }
        return redirect()->route('home');
    }
}
