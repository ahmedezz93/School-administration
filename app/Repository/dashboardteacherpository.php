<?php

namespace App\Repository;

use App\interface\dashboardteacherpositoryinterface;
use App\Models\attendance;
use App\Models\section;
use App\Models\student;
use App\Models\teacher_section;

class dashboardteacherpository implements dashboardteacherpositoryinterface{

    public function students_data(){

 $sections_id=teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
$students=student::wherein('section_id',$sections_id)->get();
return view('teachers.students_data',compact('students'));
}

public function sections_teacher(){

    $sections_id=teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
    $sections=section::wherein('id',$sections_id)->get();
    return view('teachers.sections_teacher',compact('sections'));


}


public function attendance(){

    $sections_id=teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
    $students=student::wherein('section_id',$sections_id)->get();



    return view('teachers.attendance',compact('students'));

}

public function store_attendance($request){
    foreach( $request->attendances as $studentid =>$attendance){

if($attendance=="absent"){

    $value=1;
}
elseif($attendance=="notexist"){

    $value=2;

}


     attendance::updateOrCreate(
        [
            'student_id'=>$studentid,
            'date'=>date('Y-m-d')
        ]

        ,[
        "student_id"=>$studentid,
        "grade_id"=>$request->grade_id,
        "class_id"=>$request->class_id,
        "section_id"=>$request->section_id,
        "date"=>date('Y-m-d'),
        "attendance_status"=>$value,
     ]);




    }
 flash()->addsuccess(trans('messages.save_message'));
 return back();
}


public function attendance_reports(){

    $sections_id=teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
    $students=student::wherein('section_id',$sections_id)->get();


    return view('teachers.attendance.attendance_report',compact('students'));
}


public function search_attendance($request){


    $sections_id=teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
    $students=student::wherein('section_id',$sections_id)->get();


    if($request->student_id==0){
        $attendances= attendance::wherebetween('date',[$request->from,$request->to])->get();
        return view('teachers.attendance.attendance_report',compact('attendances','students'));

    }


    else{

        $attendances= attendance::where('student_id',$request->student_id)->wherebetween('date',[$request->from,$request->to])->get();
        return view('teachers.attendance.attendance_report',compact('attendances','students'));

    }


}


}
