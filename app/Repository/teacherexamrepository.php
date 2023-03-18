<?php

namespace App\Repository;

use App\interface\teacherexamrepositoryinterface;
use App\Models\classroom;
use App\Models\degree;
use App\Models\exam;
use App\Models\grade;
use App\Models\section;
use App\Models\subject;
use App\Models\teacher;
use App\Models\teacher_section;
use Illuminate\Support\Facades\Auth;

class teacherexamrepository implements teacherexamrepositoryinterface
{

    public function exams()
    {
        $exams = exam::all();
        return view('teachers.exams.index', compact('exams'));
    }

    public function create_exams()
    {
        $sections= teacher_section::where('teacher_id',auth()->user()->id)->pluck('section_id');
        $grade_id=section::wherein('id',$sections)->pluck('grade_id');
        $grades=grade::wherein('id',$grade_id)->get();
        $data['subjects'] = subject::where('teacher_id',auth()->user()->id)->get();

        return view('teachers.exams.create',compact('sections','grades'), $data);
    }

    public function store_exams($request)
    {

           $subjects=subject::where('grade_id',$request->Grade_id)->where('class_id',$request->Classroom_id)->where('teacher_id',auth()->user()->id)->get();
if($subjects->count()>0){

    $exam=exam::create([
        'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
        'subject_id' => $request->subject_id,
        'teacher_id' =>auth()->user()->id,
        'grade_id' => $request->Grade_id,
        'class_id' => $request->Classroom_id,
        'section_id' => $request->section_id,
    ]);


    flash()->addsuccess(trans('messages.save_message'));
    return back();


}

else{


flash()->adderror(trans('messages.subject_not_found'));
return back();

}


    }

    public function edit_exams($id)
    {
        $data['exam']=exam::where('id',$id)->first();
        $data['grades'] = grade::all();
        $data['subjects'] = subject::all();
        $data['teachers'] = teacher::all();


        return view('teachers.exams.edit', $data);
    }


    public function update_exams($request)
    {
          exam::where('id',$request->id)->update([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'subject_id' => $request->subject_id,
            'teacher_id' => Auth::user()->id,
            'grade_id' => $request->Grade_id,
            'class_id' => $request->Classroom_id,
            'section_id' => $request->section_id,

          ]);

          flash()->addsuccess(trans('messages.update_message'));
          return back();

    }



    public function delete_exams($request){

exam::where('id',$request->id)->delete();
flash()->adderror(trans('messages.delete_message'));
return back();

    }

    public function show_students_exams($id){

        $degrees=degree::where('exam_id',$id)->get();


        return view('teachers.exams.students_exams',compact('degrees'));
    }

    public function repeat_exam($id){

$degree=degree::where('id',$id)->delete();
flash()->addwarning(trans('messages.Retest successfully'));
return back();
    }

}
