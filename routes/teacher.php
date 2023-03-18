<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\teacher_dashboard\DashboardTeacherController;
use App\Http\Controllers\teacher_dashboard\ProfileTeacherController;
use App\Http\Controllers\teacher_dashboard\QuestionController;
use App\Http\Controllers\teacher_dashboard\TeacherExamController;
use App\Http\Controllers\TeacherController;
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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher' ]
    ], function(){


        Route::get('teacher/dashboard',[TeacherController::class,'counts'])->name('teacher/dashboard');
Route::get('students_data',[DashboardTeacherController::class,'students_data'])->name('students_data');
Route::get('sections_teacher',[DashboardTeacherController::class,'sections_teacher'])->name('sections_teacher');
//---------------------------------------------attendances-------------------------------------------------------------------------------------------------------------
Route::get('attendance',[DashboardTeacherController::class,'attendance'])->name('attendance');
Route::post('attendance_students',[DashboardTeacherController::class,'store_attendance'])->name('attendance_students');
Route::get('attendance_reports',[DashboardTeacherController::class,'attendance_reports'])->name('attendance_reports');
Route::post('search_attendance',[DashboardTeacherController::class,'search_attendance'])->name('search_attendance');
//----------------------------------------------exams-----------------------------------------------------------
Route::get('exam',[TeacherExamController::class,'index'])->name('exam');
Route::get('create_exam',[TeacherExamController::class,'create'])->name('create_exam');
Route::post('store_exam',[TeacherExamController::class,'store'])->name('store_exam');
Route::get('edit_exam/{id}',[TeacherExamController::class,'edit'])->name('edit_exam');
Route::get('get_subjects/{id}',[TeacherExamController::class,'get_subject'])->name('get_subjects');
Route::post('update_exam',[TeacherExamController::class,'update'])->name('update_exam');
Route::post('delete_exam',[TeacherExamController::class,'destroy'])->name('delete_exam');
Route::get('get_class/{id}',[SectionController::class,'get_class'])->name('get_class');
Route::get('get_section/{id}',[StudentController::class,'get_section'])->name('get_section');
Route::get('show_students_exams/{id}',[TeacherExamController::class,'show_students_exams'])->name('show_students_exams');
Route::get('repeat_exam/{id}',[TeacherExamController::class,'repeat_exam'])->name('repeat_exam');

//----------------------------------------------questions-----------------------------------------------------------
Route::get('questions',[QuestionController::class,'showed'])->name('questions');
Route::get('create_questions/{id}',[QuestionController::class,'show'])->name('create_questions');
Route::post('store_questions',[QuestionController::class,'store'])->name('store_questions');
Route::get('edit_question/{id}',[QuestionController::class,'edit'])->name('edit_question');
Route::post('update_question',[QuestionController::class,'update'])->name('update_question');
Route::get('create_question/{id}',[QuestionController::class,'create_question'])->name('create_question');
Route::post('destroy_question',[QuestionController::class,'destroy'])->name('destroy_question');
//----------------------------------------------profile-----------------------------------------------------------
Route::get('profile',[ProfileTeacherController::class,'index'])->name('profile');
Route::post('update_profile',[ProfileTeacherController::class,'update'])->name('update_profile');

    });
