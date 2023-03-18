<?php

namespace App\Repository;

use App\interface\attendancerepositoryinterface;
use App\Models\attendance;
use App\Models\grade;
use App\Models\student;

class attendancerepository implements attendancerepositoryinterface
{
    public function sections(){
  $students=student::all();
  $grades=grade::all();
return view('attendance.sections',compact('students','grades'));
    }

    public function list_attendance($id)
    {
        $students=student::where('section_id',$id)->get();

        return view('attendance.attendance',compact('students'));

    }

    public function store_attendance($request)
    {


        foreach ($request->attendances as $student_id=> $attendance) {

                 if($attendance=='presence'){

                    $attendance_status=1;
                 }
                 elseif($attendance=='absent'){

                    $attendance_status=2;

                 }

                    attendance::create([
                        "student_id"=>$student_id,
                        "grade_id"=>$request->grade_id,
                        "class_id"=>$request->class_id,
                        "section_id"=>$request->section_id,
                        "date"=>date('Y-m-d'),
                        "attendance_status"=>$attendance_status,
                        ]);

                    }

        flash()->addsuccess(trans('messages.save_message'));
        return back();



        }

    }




