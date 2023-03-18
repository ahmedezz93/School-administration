<?php

use App\Http\Controllers\student_dashboard\ExamTeacherController;
use App\Http\Controllers\student_dashboard\ProfileStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:student' ]
    ], function(){

        Route::get('student/dashboard',function(){

            return view('students.dashboard');
        });

        Route::get('the_exams',[ExamTeacherController::class,'index'])->name('the_exams');
        Route::get('show_question/{exam_id}',[ExamTeacherController::class,'show'])->name('show_question');
//----------------------------------------------profile-----------------------------------------------------------
Route::get('profile_student',[ProfileStudentController::class,'index'])->name('profile_student');
Route::post('update_profile_student',[ProfileStudentController::class,'update'])->name('update_profile_student');

    });
