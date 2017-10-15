<?php

namespace App\Http\Controllers\Backend\Student;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class SoftwareEngineeringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('students')->where('class', '=', 'Software Engineering')->get();
        return View('backend.student.softwareEngineering.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = DB::table('students')->get();
        return View::make('backend.student.softwareEngineering.create')->with('students', $student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        student::create($request->all());
        return Redirect::to('softwareEngineering');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = student::find($id);
        return view('backend.student.softwareEngineering.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = student::find($id);
        return view('backend.student.softwareEngineering.edit', compact('student'));
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
        student::find($id)->update($request->all());
        return Redirect::to('softwareEngineering');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::find($id)->delete();
        return Redirect::to('softwareEngineering');
    }
}
