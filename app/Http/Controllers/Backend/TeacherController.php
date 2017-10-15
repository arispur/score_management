<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Teacher;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $teacher = DB::table('teachers')
            ->join('subjects', 'subjects.id_subject', '=', 'teachers.subject_id')
            ->select('teachers.*', 'subjects.subject_name')
            ->get();
        return View('backend.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('subjects')->get();
        return View::make('backend.teacher.create')->with('subjects', $teacher);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        teacher::create($request->all());
        return Redirect::to('teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = DB::table('teachers')
            ->join('subjects', 'subjects.id_subject', '=', 'teachers.subject_id')
            ->select('teachers.*', 'subjects.subject_name')
            ->where('nip','=',$id)
            ->first();
        return view('backend.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = DB::table('teachers')
            ->join('subjects', 'subjects.id_subject', '=', 'teachers.subject_id')
            ->select('teachers.*', 'subjects.subject_name')
            ->where('nip','=',$id)
            ->first();
        $subject = DB::table('subjects')->get();
        return view('backend.teacher.edit', compact('teacher','subject'));
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
        teacher::find($id)->update($request->all());
        return Redirect::to('teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        teacher::find($id)->delete();
        return Redirect::to('teacher');
    }
}
