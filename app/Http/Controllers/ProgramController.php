<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Course;
use App\User;
use App\Category;
use App\Tutor;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLogin = Auth::user();
        $company = Company::where('user_id', $userLogin->id)->first();
        $program = Program::where('company_id', $company->id)->get();
        // $courses = Company::all();

        return view ('dashboard/company/program', [
            'userLogin' => $userLogin,
            'company' => $company,
            'program' => $program,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userLogin = Auth::user();
        $company = Company::where('user_id', $userLogin->id)->first();
        $program = Program::where('company_id', $company->id)->get();
        //$program = Program::find($id);
        
        // dd('hello');

        return view('dashboard/company/program',[
            'userLogin' => $userLogin,
            'company' => $company,
            'program' => $program,
            //'program' => $program
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userLogin = Auth::user();
        $company = Company::where('user_id',$userLogin->id)->first();
        // dd($userLogin);
        // dd($company);
        $data = $request->all();

        $program = Program::create([
            'company_id' => $company->id,
            'name' => $data['name'],
            'degree' => $data['degree'],
            'requirement' => $data['requirement'],
            
        ]);
        return back();
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
        //
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
        $program = Program::find($id);
        $data = $request->all();

        $program->name = $data['name'];
        $program->degree = $data['degree'];
        $program->requirement = $data['requirement'];

        $program->save();
        return redirect('/dashboard/company/program');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProgram($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect('/dashboard/company/program');
    }
}
