<?php

namespace App\Http\Controllers;

use App\Mail\ApplicableInternship;
use Illuminate\Http\Request;
use App\Models\Internship;
use Illuminate\Support\Facades\Mail;

class InternshipController extends Controller
{
    private $rules = [
        'name' => ['required', 'max:255'],
        'company_name' => ['required', 'max:255'],
        'description' => ['required', 'max:500'],
        'expires_at' => ['required', 'date', 'after:now'],
        'required_faculty' => ['nullable'],
        'required_department' => ['nullable'],
        'minimum_year' => ['nullable', 'integer'],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internship-list', ['internships' => Internship::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internship-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $data = array_filter($request->except('_token'));
        $internship = Internship::create($data);
        $requirements = [['minimum_level', '>=', $internship->minimum_level], ['email_subscription', '=', '1']];
        if ($internship->required_faculty != 'Any'){
            array_push($requirements, ['required_faculty', '=' , $internship->required_faculty]);
        }
        if ($internship->required_department != 'Any'){
            array_push($requirements, ['required_department', '=', $internship->required_department]);
        }
        $users = User::where($requirements);
        foreach ($users as $user){
            Mail::to($user->email)->send(new ApplicableInternship($user, $internship));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('internship-edit', ['internship' => Internship::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $data = array_filter($request->except(['_token']));
        Internship::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Internship::destroy($id);
        return redirect()->route('internship.list');
    }
}
