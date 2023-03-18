<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OnlineClassesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentsAccountController;
use App\Http\Controllers\StudentsFeeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Repository\settingrepository;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class,'index'])->name('selection');

Route::get('login/{type}', [HomeController::class,'showform'])->middleware('guest')->name('login.show');
Route::post('login',[HomeController::class,'login'])->name('login');
Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
Route::post('/logout/{type}', [HomeController::class,'destroy'])->name('logout');




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard'); //------------------------الصفحة الرئيسية
//----------------------------------------------grades-----------------------------------------------------------

Route::get('grades',[GradeController::class,'index'])->name('grades');
Route::post('store_grade',[GradeController::class,'store'])->name('store_grade');
Route::post('update_grade',[GradeController::class,'update'])->name('update_grade');
Route::post('delete_grade/{id}',[GradeController::class,'destroy'])->name('delete_grade');

//----------------------------------------------classrooms-----------------------------------------------------------
Route::get('classrooms',[ClassroomController::class,'index'])->name('classrooms');
Route::post('store_classroom',[ClassroomController::class,'store'])->name('store_classroom');
Route::post('update_classroom',[ClassroomController::class,'update'])->name('update_classroom');
Route::post('delete_class',[ClassroomController::class,'destroy'])->name('delete_class');
Route::post('delete_chosen_classes',[ClassroomController::class,'delete_chosen_classes'])->name('delete_chosen_classes');
Route::post('filter_classes',[ClassroomController::class,'filter_classes'])->name('filter_classes');

//----------------------------------------------sections-----------------------------------------------------------
Route::get('sections',[SectionController::class,'index'])->name('sections');
Route::post('create_section',[SectionController::class,'create'])->name('create_section');
Route::post('update_section/{id}',[SectionController::class,'update'])->name('update_section');
Route::post('delete_section/{id}',[SectionController::class,'destroy'])->name('delete_section');
//----------------------------------------------livewire-----------------------------------------------------------
Route::view('add_parent','livewire.show_form')->name('add_parent');
//----------------------------------------------teachers-----------------------------------------------------------
Route::get('teachers',[TeacherController::class,'index'])->name('teachers');
Route::get('create_teachers',[TeacherController::class,'create'])->name('create_teachers');
Route::post('store_teachers',[TeacherController::class,'store'])->name('store_teachers');
Route::post('delete_teacher',[TeacherController::class,'destroy'])->name('delete_teacher');
Route::get('edit_teacher/{id}',[TeacherController::class,'edit'])->name('edit_teacher');
Route::post('update_teacher',[TeacherController::class,'update'])->name('update_teacher');

//----------------------------------------------students-----------------------------------------------------------
Route::get('students',[StudentController::class,'index'])->name('students');
Route::get('add_student',[StudentController::class,'create'])->name('add_student');
Route::post('store_student',[StudentController::class,'store'])->name('store_student');
Route::get('edit_student/{id}',[StudentController::class,'edit'])->name('edit_student');
Route::post('update_student',[StudentController::class,'update'])->name('update_student');
Route::post('delete_student',[StudentController::class,'destroy'])->name('delete_student');
Route::post('filter_student',[StudentController::class,'filter_student'])->name('filter_student');

//----------------------------------------------fees-----------------------------------------------------------
Route::get('fees',[FeeController::class,'index'])->name('fees');
Route::get('create_fees',[FeeController::class,'create'])->name('create_fees');
Route::post('store_fees',[FeeController::class,'store'])->name('store_fees');
Route::post('delete_fees',[FeeController::class,'destroy'])->name('delete_fees');
Route::get('edit_fees/{id}',[FeeController::class,'edit'])->name('edit_fees');
Route::post('update_fees',[FeeController::class,'update'])->name('update_fees');
//----------------------------------------------student_fees-----------------------------------------------------------
Route::get('create_students_fees/{id}',[StudentsFeeController::class,'create'])->name('create_students_fees');
Route::get('get_price/{id}',[StudentsFeeController::class,'get_price'])->name('get_price');
Route::post('store_students_fees',[StudentsFeeController::class,'store'])->name('store_students_fees');
//----------------------------------------------payment-----------------------------------------------------------
Route::get('create_payment/{id}',[PaymentController::class,'create'])->name('create_payment');
Route::post('store_payment',[PaymentController::class,'store'])->name('store_payment');
Route::get('payments',[PaymentController::class,'index'])->name('payments');
Route::get('edit_payment/{id}',[PaymentController::class,'edit'])->name('edit_payment');
Route::post('update_payment',[PaymentController::class,'update'])->name('update_payment');
Route::post('delete_payment',[PaymentController::class,'destroy'])->name('delete_payment');

//----------------------------------------------students_accounts-----------------------------------------------------------
Route::get('students_accounts',[StudentsAccountController::class,'index'])->name('students_accounts');
Route::get('edit_accounts/{id}',[StudentsAccountController::class,'edit'])->name('edit_accounts');
Route::post('store_accounts',[StudentsAccountController::class,'update'])->name('store_accounts');
Route::get('details_accounts/{id}',[StudentsAccountController::class,'details'])->name('details_accounts');
Route::post('delete_accounts',[StudentsAccountController::class,'destroy'])->name('delete_accounts');
Route::get('filter_account/{id}',[StudentsAccountController::class,'filter_account'])->name('filter_account');
Route::post('update_filter_account',[StudentsAccountController::class,'update_filter_account'])->name('update_filter_account');

//----------------------------------------------promotions-----------------------------------------------------------
Route::get('students_promotion',[PromotionController::class,'create'])->name('students_promotion');
Route::post('store_promotion',[PromotionController::class,'store'])->name('store_promotion');
//----------------------------------------------attendance-----------------------------------------------------------
Route::get('attendance_sections',[AttendanceController::class,'index'])->name('attendance_sections');
Route::get('list_attendance/{id}',[AttendanceController::class,'create'])->name('list_attendance');
Route::post('store_attendance',[AttendanceController::class,'store'])->name('store_attendance');
//----------------------------------------------subjects-----------------------------------------------------------
Route::get('subjects',[SubjectController::class,'index'])->name('subjects');
Route::get('create_subjects',[SubjectController::class,'create'])->name('create_subjects');
Route::post('store_subjects',[SubjectController::class,'store'])->name('store_subjects');
Route::get('edit_subjects/{id}',[SubjectController::class,'edit'])->name('edit_subjects');
Route::post('update_subjects',[SubjectController::class,'update'])->name('update_subjects');
Route::post('delete_subjects',[SubjectController::class,'destroy'])->name('delete_subjects');
//----------------------------------------------exams-----------------------------------------------------------
Route::get('exams',[ExamController::class,'index'])->name('exams');
Route::get('create_exams',[ExamController::class,'create'])->name('create_exams');
Route::post('store_exams',[ExamController::class,'store'])->name('store_exams');
Route::get('edit_exams/{id}',[ExamController::class,'edit'])->name('edit_exams');
Route::get('get_subject/{id}',[ExamController::class,'get_subject'])->name('get_subject');
Route::post('update_exams',[ExamController::class,'update'])->name('update_exams');
Route::post('delete_exams',[ExamController::class,'destroy'])->name('delete_exams');
//----------------------------------------------library-----------------------------------------------------------
Route::get('library',[LibraryController::class,'index'])->name('library');
Route::get('create_library',[LibraryController::class,'create'])->name('create_library');
Route::post('store_library',[LibraryController::class,'store'])->name('store_library');
Route::get('edit_library/{id}',[LibraryController::class,'edit'])->name('edit_library');
Route::post('destroy_library',[LibraryController::class,'destroy'])->name('destroy_library');
Route::post('update_library',[LibraryController::class,'update'])->name('update_library');
//----------------------------------------------settings-----------------------------------------------------------
Route::get('settings',[settingrepository::class,'index'])->name('settings');
Route::post('update_setting',[settingrepository::class,'update'])->name('update_setting');
//----------------------------------------------dashboard-----------------------------------------------------------
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
//------------------------------logout--------------------------------------------------------------------------------------
});


//require __DIR__.'/auth.php';
