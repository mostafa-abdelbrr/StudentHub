<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $rules = [
'name' => ['required','unique:companies','max:255'],
'logo' => ['nullable','image'],
'field' => ['required', 'max:255'],
'address' => ['required','max:255'],
];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company-list', ['companies' => Company::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company-create');

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
        if($request->logo){
            $file = $request->file('logo');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
//            $file-> move(public_path('public/Image'), $filename);
            $data['logo'] = $filename;
//            $request->file('logo')->storeAs('images', $filename);

            $request->logo->move(public_path('images'), $filename);

        }
//        dd($data);
        $company = Company::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('company-edit', ['company' => Company::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $data = array_filter($request->except(['_token']));
        Company::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('company.list');

    }
}
