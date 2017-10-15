<?php

namespace App\Http\Controllers\Backend\Score;

use Illuminate\Http\Request;
use App\model\score\Physics;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use View;
use Input;
use Redirect;

class PhysicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $physics = DB::table('physics')
            ->join('students', 'students.nis', '=', 'physics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'physics.id_nip')
            ->select('physics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->get();
        return View('backend.score.physics.index', compact('physics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = DB::table('teachers')->get();
        return View('backend.score.physics.create', compact('physics','teacher'));
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

        $physicsScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $physics                              = new physics;

        $physics->id_nis                  = $request->id_nis;
        $physics->id_nip                  = $request->id_nip;
        $physics->daily_task_1            = $dailyTask1;
        $physics->daily_task_2            = $dailyTask2;
        $physics->daily_task_3            = $dailyTask3;
        $physics->daily_exam_1            = $dailyExam1;
        $physics->daily_exam_2            = $dailyExam2;
        $physics->daily_exam_3            = $dailyExam3;
        $physics->midterm_tests           = $midtermTests;
        $physics->final_exam              = $finalExam;
        $physics->physics_score           = $physicsScore;


        $physics->save();

        return Redirect::to('physics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $physics = DB::table('physics')
            ->join('students', 'students.nis', '=', 'physics.id_nis')
            ->join('teachers', 'teachers.nip', '=', 'physics.id_nip')
            ->select('physics.*', 'students.student_name', 'students.class', 'teachers.teacher_name')
            ->where('physics.id','=',$id)
            ->first();
        return View('backend.score.physics.show', compact('physics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $physics = DB::table('physics')
            ->join('teachers', 'teachers.nip', '=', 'physics.id_nip')
            ->select('physics.*', 'teachers.teacher_name')
            ->where('id','=',$id)
            ->first();
        $teacher = DB::table('teachers')->get();
        return View('backend.score.physics.edit', compact('physics','teacher'));
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

        $physicsScore=((($dailyTask1+$dailyTask2+$dailyTask3)/3)*30/100)+((($dailyExam1+$dailyExam2+$dailyExam3)/3)*30/100)+($midtermTests*20/100)+($finalExam*20/100);

        $physics = physics::find($id);

        $physics->id_nis                  = $request->id_nis;
        $physics->id_nip                  = $request->id_nip;
        $physics->daily_task_1            = $dailyTask1;
        $physics->daily_task_2            = $dailyTask2;
        $physics->daily_task_3            = $dailyTask3;
        $physics->daily_exam_1            = $dailyExam1;
        $physics->daily_exam_2            = $dailyExam2;
        $physics->daily_exam_3            = $dailyExam3;
        $physics->midterm_tests           = $midtermTests;
        $physics->final_exam              = $finalExam;
        $physics->physics_score           = $physicsScore;


        $physics->save();

        return Redirect::to('physics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        physics::find($id)->delete();
        return Redirect::to('physics');
    }
}
