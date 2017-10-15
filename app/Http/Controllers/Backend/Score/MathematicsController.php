<?php

namespace App\Http\Controllers\Backend\Score;

use Illuminate\Http\Request;
use App\model\score\Mathematics;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class MathematicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mathematics = DB::table('mathematics')
            ->join('students', 'students.nis', '=', 'mathematics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'mathematics.id_nip')
            ->select('mathematics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        return View('backend.score.mathematics.index', compact('mathematics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teachers')->get();
        return View('backend.score.mathematics.create', compact('mathematics','teacher'));
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

        $mathematicScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $mathematics                              = new Mathematics;

        $mathematics->id_nis                  = $request->id_nis;
        $mathematics->id_nip                  = $request->id_nip;
        $mathematics->daily_task_1            = $dailyTask1;
        $mathematics->daily_task_2            = $dailyTask2;
        $mathematics->daily_task_3            = $dailyTask3;
        $mathematics->daily_exam_1            = $dailyExam1;
        $mathematics->daily_exam_2            = $dailyExam2;
        $mathematics->daily_exam_3            = $dailyExam3;
        $mathematics->midterm_tests           = $midtermTests;
        $mathematics->final_exam              = $finalExam;
        $mathematics->mathematics_score       = $mathematicScore;


        $mathematics->save();

        return Redirect::to('mathematic');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mathematics = DB::table('mathematics')
            ->join('students', 'students.nis', '=', 'mathematics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'mathematics.id_nip')
            ->select('mathematics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->where('mathematics.id','=',$id)
            ->first();
        return View('backend.score.mathematics.show', compact('mathematics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mathematics = DB::table('mathematics')
            ->join('teachers', 'teachers.nip', '=', 'mathematics.id_nip')
            ->select('mathematics.*', 'teachers.teacher_name')
            ->where('id','=',$id)
            ->first();
        $teacher = DB::table('teachers')->get();
        return View('backend.score.mathematics.edit', compact('mathematics','teacher'));
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

        $mathematicScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $mathematics = mathematics::find($id);

        $mathematics->id_nis                  = $request->id_nis;
        $mathematics->id_nip                  = $request->id_nip;
        $mathematics->daily_task_1            = $dailyTask1;
        $mathematics->daily_task_2            = $dailyTask2;
        $mathematics->daily_task_3            = $dailyTask3;
        $mathematics->daily_exam_1            = $dailyExam1;
        $mathematics->daily_exam_2            = $dailyExam2;
        $mathematics->daily_exam_3            = $dailyExam3;
        $mathematics->midterm_tests           = $midtermTests;
        $mathematics->final_exam              = $finalExam;
        $mathematics->mathematics_score       = $mathematicScore;


        $mathematics->save();

        return Redirect::to('mathematic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mathematics::find($id)->delete();
        return Redirect::to('mathematic');
    }
}
