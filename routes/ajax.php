<?php

use App\Http\Controllers\OnlineClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\teacher_dashboard\DashboardTeacherController;
use App\Http\Controllers\teacher_dashboard\QuestionController;
use App\Http\Controllers\teacher_dashboard\TeacherExamController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ajx Routes
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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher,web' ]
    ], function(){

Route::get('get_class/{id}',[SectionController::class,'get_class'])->name('get_class');
Route::get('get_section/{id}',[StudentController::class,'get_section'])->name('get_section');
//----------------------------------------------online_classes-----------------------------------------------------------
Route::get('online_class',[OnlineClassesController::class,'index'])->name('online_class');
Route::get('create_online_class',[OnlineClassesController::class,'create'])->name('create_online_class');
Route::post('create_online_class',[OnlineClassesController::class,'store'])->name('create_online_class');
Route::post('destroy_online_class',[OnlineClassesController::class,'destroy'])->name('destroy_online_class');

});

