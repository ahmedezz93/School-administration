<?php

namespace App\Repository;

use App\interface\examrepositoryinterface;
use App\Models\exam;
use App\Models\grade;
use App\Models\section;
use App\Models\subject;
use App\Models\teacher;

class examrepository implements examrepositoryinterface
{
    public function exams()
    {
        $exams = exam::all();
        return view('exams.index', compact('exams'));
    }

    public function create_exams()
    {
        $data['grades'] = grade::all();
        $data['subjects'] = subject::all();
        $data['teachers'] = teacher::all();

        return view('exams.create', $data);
    }

    public function store_exams($request)
    {
        exam::create([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'grade_id' => $request->Grade_id,
            'class_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
        ]);
        flash()->addsuccess(trans('messages.save_message'));
        return back();
    }

    public function edit_exams($id)
    {
        $data['exam']=exam::where('id',$id)->first();
        $data['grades'] = grade::all();
        $data['subjects'] = subject::all();
        $data['teachers'] = teacher::all();


        return view('exams.edit', $data);
    }


    public function update_exams($request)
    {
          exam::where('id',$request->id)->update([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'grade_id' => $request->Grade_id,
            'class_id' => $request->Classroom_id,
            'section_id' => $request->section_id,

          ]);
          flash()->addsuccess(trans('messages.update_message'));
          return back();

    }


    public function get_subject($id){

       $subjects=subject::where('class_id',$id)->pluck('name','id');
       return json_encode($subjects);
    }


    public function delete_exams($request){

exam::where('id',$request->id)->delete();
flash()->adderror(trans('messages.delete_message'));
return back();

    }

    public function get_sections($id){

        $classes=section::where('class_id',$id)->pluck('name','id');
        return json_encode($classes);


      }

}
