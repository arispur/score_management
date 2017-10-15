<?php

namespace App\Http\Controllers\Backend\Score;

use Illuminate\Http\Request;
use App\model\score\Biology;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class BiologyController extends Controller
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
        return View('backend.score.biology.index', compact('biology'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teachers')->get();
        return View('backend.score.biology.create', compact('biology','teacher'));
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

        $biologyScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $biology                              = new biology;

        $biology->id_nis                  = $request->id_nis;
        $biology->id_nip                  = $request->id_nip;
        $biology->daily_task_1            = $dailyTask1;
        $biology->daily_task_2            = $dailyTask2;
        $biology->daily_task_3            = $dailyTask3;
        $biology->daily_exam_1            = $dailyExam1;
        $biology->daily_exam_2            = $dailyExam2;
        $biology->daily_exam_3            = $dailyExam3;
        $biology->midterm_tests           = $midtermTests;
        $biology->final_exam              = $finalExam;
        $biology->biology_score           = $biologyScore;


        $biology->save();

        return Redirect::to('biology');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biology = DB::table('biology')
            ->join('students', 'students.nis', '=', 'biology.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'biology.id_nip')
            ->select('biology.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->where('biology.id','=',$id)
            ->first();
        return View('backend.score.biology.show', compact('biology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biology = DB::table('biology')
            ->join('teachers', 'teachers.nip', '=', 'biology.id_nip')
            ->select('biology.*', 'teachers.teacher_name')
            ->where('id','=',$id)
            ->first();
        $teacher = DB::table('teachers')->get();
        return View('backend.score.biology.edit', compact('biology','teacher'));
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

        $biologyScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $biology = biology::find($id);

        $biology->id_nis                  = $request->id_nis;
        $biology->id_nip                  = $request->id_nip;
        $biology->daily_task_1            = $dailyTask1;
        $biology->daily_task_2            = $dailyTask2;
        $biology->daily_task_3            = $dailyTask3;
        $biology->daily_exam_1            = $dailyExam1;
        $biology->daily_exam_2            = $dailyExam2;
        $biology->daily_exam_3            = $dailyExam3;
        $biology->midterm_tests           = $midtermTests;
        $biology->final_exam              = $finalExam;
        $biology->biology_score           = $biologyScore;


        $biology->save();

        return Redirect::to('biology');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        biology::find($id)->delete();
        return Redirect::to('biology');
    }
}
