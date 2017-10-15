<?php

namespace App\Http\Controllers\Backend\Score;

use Illuminate\Http\Request;
use App\model\score\English;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class EnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $english = DB::table('english')
            ->join('students', 'students.nis', '=', 'english.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'english.id_nip')
            ->select('english.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        return View('backend.score.english.index', compact('english'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teachers')->get();
        return View('backend.score.english.create', compact('english','teacher'));
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

        $englishScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $english                              = new english;

        $english->id_nis                  = $request->id_nis;
        $english->id_nip                  = $request->id_nip;
        $english->daily_task_1            = $dailyTask1;
        $english->daily_task_2            = $dailyTask2;
        $english->daily_task_3            = $dailyTask3;
        $english->daily_exam_1            = $dailyExam1;
        $english->daily_exam_2            = $dailyExam2;
        $english->daily_exam_3            = $dailyExam3;
        $english->midterm_tests           = $midtermTests;
        $english->final_exam              = $finalExam;
        $english->english_score           = $englishScore;


        $english->save();

        return Redirect::to('english');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $english = DB::table('english')
            ->join('students', 'students.nis', '=', 'english.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'english.id_nip')
            ->select('english.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->where('english.id','=',$id)
            ->first();
        return View('backend.score.english.show', compact('english'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $english = DB::table('english')
            ->join('teachers', 'teachers.nip', '=', 'english.id_nip')
            ->select('english.*', 'teachers.teacher_name')
            ->where('id','=',$id)
            ->first();
        $teacher = DB::table('teachers')->get();
        return View('backend.score.english.edit', compact('english','teacher'));
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

        $englishScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $english = english::find($id);

        $english->id_nis                  = $request->id_nis;
        $english->id_nip                  = $request->id_nip;
        $english->daily_task_1            = $dailyTask1;
        $english->daily_task_2            = $dailyTask2;
        $english->daily_task_3            = $dailyTask3;
        $english->daily_exam_1            = $dailyExam1;
        $english->daily_exam_2            = $dailyExam2;
        $english->daily_exam_3            = $dailyExam3;
        $english->midterm_tests           = $midtermTests;
        $english->final_exam              = $finalExam;
        $english->english_score           = $englishScore;


        $english->save();

        return Redirect::to('english');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        english::find($id)->delete();
        return Redirect::to('english');
    }
}
