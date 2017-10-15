<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Score;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biology = DB::table('biology')
            ->join('students', 'students.nis', '=', 'biology.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'biology.id_nip')
            ->select('biology.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        $civicEducation = DB::table('civic_education')
            ->join('students', 'students.nis', '=', 'civic_education.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'civic_education.id_nip')
            ->select('civic_education.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        $english = DB::table('english')
            ->join('students', 'students.nis', '=', 'english.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'english.id_nip')
            ->select('english.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        $mathematics = DB::table('mathematics')
            ->join('students', 'students.nis', '=', 'mathematics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'mathematics.id_nip')
            ->select('mathematics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        $physics = DB::table('physics')
            ->join('students', 'students.nis', '=', 'physics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'physics.id_nip')
            ->select('physics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();

        return View('backend.score.index', compact('student','biology','civicEducation','english','mathematics','physics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $score = DB::table('students')->get();
        return View('backend.score.create', compact('score'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nis            = $request->id_nis;
        $biology        = DB::table('biology')->where('id_nis','=',$nis)->select('id');
        $civicEducation = DB::table('civic_education')->where('id_nis','=',$nis)->select('id');
        $english        = DB::table('english')->where('id_nis','=',$nis)->select('id');
        $mathematics    = DB::table('mathematics')->where('id_nis','=',$nis)->select('id');
        $physics        = DB::table('physics')->where('id_nis','=',$nis)->select('id');

        $score                          = new score;

        $score->id_nis                  = $nis;
        $score->id_biology              = $biology;
        $score->id_civic_education      = $civicEducation;
        $score->english                 = $english;
        $score->mathematics             = $mathematics;
        $score->physics                 = $physics;


        $score->save();

        return Redirect::to('reportScore');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
