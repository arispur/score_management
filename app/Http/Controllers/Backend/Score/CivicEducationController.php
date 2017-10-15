<?php

namespace App\Http\Controllers\Backend\Score;

use Illuminate\Http\Request;
use App\model\score\CivicEducation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class CivicEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $civicEducation = DB::table('civic_education')
            ->join('students', 'students.nis', '=', 'civic_education.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'civic_education.id_nip')
            ->select('civic_education.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        return View('backend.score.civicEducation.index', compact('civicEducation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teachers')->get();
        return View('backend.score.civicEducation.create', compact('civicEducation','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dailyTask1   = $request->daily_task_1;
        $dailyTask2   = $request->daily_task_2;
        $dailyTask3   = $request->daily_task_3;
        $dailyExam1   = $request->daily_exam_1;
        $dailyExam2   = $request->daily_exam_2;
        $dailyExam3   = $request->daily_exam_3;
        $midtermTests = $request->midterm_tests;
        $finalExam    = $request->final_exam;

        $civicEducationScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $civicEducation                              = new civicEducation;

        $civicEducation->id_nis                  = $request->id_nis;
        $civicEducation->id_nip                  = $request->id_nip;
        $civicEducation->daily_task_1            = $dailyTask1;
        $civicEducation->daily_task_2            = $dailyTask2;
        $civicEducation->daily_task_3            = $dailyTask3;
        $civicEducation->daily_exam_1            = $dailyExam1;
        $civicEducation->daily_exam_2            = $dailyExam2;
        $civicEducation->daily_exam_3            = $dailyExam3;
        $civicEducation->midterm_tests           = $midtermTests;
        $civicEducation->final_exam              = $finalExam;
        $civicEducation->civic_education_score   = $civicEducationScore;


        $civicEducation->save();

        return Redirect::to('civicEducation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $civicEducation = DB::table('civic_education')
            ->join('students', 'students.nis', '=', 'civic_education.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'civic_education.id_nip')
            ->select('civic_education.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->where('civic_education.id','=',$id)
            ->first();
        return View('backend.score.civicEducation.show', compact('civicEducation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $civicEducation = DB::table('civic_education')
            ->join('teachers', 'teachers.nip', '=', 'civic_education.id_nip')
            ->select('civic_education.*', 'teachers.teacher_name')
            ->where('id','=',$id)
            ->first();
        $teacher = DB::table('teachers')->get();
        return View('backend.score.civicEducation.edit', compact('civicEducation','teacher'));
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
        $dailyTask1   = $request->daily_task_1;
        $dailyTask2   = $request->daily_task_2;
        $dailyTask3   = $request->daily_task_3;
        $dailyExam1   = $request->daily_exam_1;
        $dailyExam2   = $request->daily_exam_2;
        $dailyExam3   = $request->daily_exam_3;
        $midtermTests = $request->midterm_tests;
        $finalExam    = $request->final_exam;

        $civicEducationScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $civicEducation = civicEducation::find($id);

        $civicEducation->id_nis                  = $request->id_nis;
        $civicEducation->id_nip                  = $request->id_nip;
        $civicEducation->daily_task_1            = $dailyTask1;
        $civicEducation->daily_task_2            = $dailyTask2;
        $civicEducation->daily_task_3            = $dailyTask3;
        $civicEducation->daily_exam_1            = $dailyExam1;
        $civicEducation->daily_exam_2            = $dailyExam2;
        $civicEducation->daily_exam_3            = $dailyExam3;
        $civicEducation->midterm_tests           = $midtermTests;
        $civicEducation->final_exam              = $finalExam;
        $civicEducation->civic_education_score   = $civicEducationScore;


        $civicEducation->save();

        return Redirect::to('civicEducation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        civicEducation::find($id)->delete();
        return Redirect::to('civicEducation');
    }
}
