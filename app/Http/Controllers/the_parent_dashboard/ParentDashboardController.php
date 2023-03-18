<?php

namespace App\Http\Controllers\the_parent_dashboard;

use App\Http\Controllers\Controller;
use App\Models\degree;
use App\Models\grade;
use App\Models\student;
use App\Models\students_account;
use Illuminate\Http\Request;

class ParentDashboardController extends Controller
{
public function index(){


    $sons=student::where('parent_id',auth()->user()->id)->get();
    return view('the_parents.dashboard',compact('sons'));

}


public function list_childs(){


    $sons=student::where('parent_id',auth()->user()->id)->get();
    return view('the_parents.list_childs',compact('sons'));

}

public function degrees_childs($id){


   $student=student::where('id',$id)->first();
   $degrees=degree::where('student_id',$id)->get();
   if($student->parent_id !== auth()->user()->id){
    flash()->adderror(trans('messages.code_error'));
    return redirect()->route('list_childs');

   }

   if($degrees->isempty()){
    flash()->adderror(trans('messages.data not found'));
    return back();

   }

    return view('the_parents.degrees_childs',compact('degrees'));

}

public function attendance_childs(){


    $sons=student::where('parent_id',auth()->user()->id)->get();
    return view('the_parents.attendance_childs',compact('sons'));


}


public function search_attendance(Request $request){



    $grades=grade::all();
$students=student::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Class_id)->where('section_id',$request->section_id)->get();
if($students->count()<1){

    flash()->adderror(trans('messages.data not found'));
    return back();
}

else{

    return view('students.students',compact('students','grades'));
}
}


public function childs_accounts()
{
    $sons=student::where('parent_id',auth()->user()->id)->get();
    return view('the_parents.childs_accounts', compact('sons'));
}

public function details_account($id)
{
    $students = student::where('id', $id)->first();

    return view('the_parents.details_accounts', compact('students'));
}

}
