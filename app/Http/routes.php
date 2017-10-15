<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('frontend.index', 'Auth\AuthController@getLogin');
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('home', function () {
    return view('backend.index');
});

Route::resource('teacher', 'Backend\TeacherController');
Route::resource('subject', 'Backend\SubjectController');
Route::resource('student', 'Backend\StudentController');

Route::resource('computerEngineering', 'Backend\Student\ComputerEngineeringController');
Route::resource('softwareEngineering', 'Backend\Student\SoftwareEngineeringController');
Route::resource('multimedia', 'Backend\Student\MultimediaController');
Route::resource('animation', 'Backend\Student\AnimationController');

Route::resource('mathematic', 'Backend\Score\MathematicsController');
Route::resource('physics', 'Backend\Score\PhysicsController');
Route::resource('civicEducation', 'Backend\Score\CivicEducationController');
Route::resource('biology', 'Backend\Score\BiologyController');
Route::resource('english', 'Backend\Score\EnglishController');

Route::resource('reportScore', 'Backend\ScoreController');

Route::resource('user', 'Backend\UserController');

