<?php

namespace App\Http\Controllers\student_dashboard;

use App\Http\Controllers\Controller;
use App\Models\exam;
use App\Models\question;
use Illuminate\Http\Request;

class ExamTeacherController extends Controller
{

public function index(){
$exams=exam::where('grade_id',auth()->user()->grade_id)->where('class_id',auth()->user()->classroom_id)->where('section_id',auth()->user()->section_id)->get();
    return view('students.students_exams.index',compact('exams'));
}

public function show($exam_id){
    
$student_id=auth()->user()->id;
return view('students.students_exams.show',compact('exam_id','student_id'));

}


}
