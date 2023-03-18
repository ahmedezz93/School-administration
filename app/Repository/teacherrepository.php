<?php

namespace App\Repository;

use App\interface\teacherrepositoryinterface;
use App\Models\gender;
use App\Models\specialization;
use App\Models\student;
use App\Models\teacher;
use App\Models\teacher_section;
use Illuminate\Support\Facades\Hash;

class teacherrepository implements teacherrepositoryinterface
{
    public function index_teachers()
    {
        $teachers = teacher::all();
        return view('teachers.teachers', compact('teachers'));
    }
    public function create_teachers()
    {
        $spectializations = specialization::all();

        $genders = gender::all();

        return view('teachers.create_teachers', compact('spectializations', 'genders'));
    }

    public function store_teachers($request)
    {
        teacher::create([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'password' => Hash::make($request->Password),
            'email' => $request->Email,
            'gender_id' => $request->Gender_id,
            'specilization_id' => $request->Specialization_id,
            'date' => $request->Joining_Date,
            'address' => $request->Address,
        ]);

        flash()->addsuccess(trans('messages.save_message'));
        return back();
    }



    public function delete_teacher($request){

teacher::where('id',$request->id)->delete();
flash()->adderror(trans('messages.delete_message'));
return back();


    }

    public function edit_teacher($id){
          $teachers=teacher::where('id',$id)->first();
          $specializations=specialization::all();
          $genders=gender::all();
        return view('teachers.edit_teachers',compact('teachers','genders','specializations'));
    }


    public function update_teacher($request){
       teacher::where('id',$request->id)->update([

      "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
      "password"=>$request->Password,
      "email"=>$request->Email,
      "gender_id"=>$request->Gender_id,
      "specilization_id"=>$request->Specialization_id,
      "date"=>$request->Joining_Date,
      "address"=>$request->Address,

       ]);

flash()->addsuccess(trans('messages.update_message'));
return back();

    }



    public function counts(){

   $teacher_id=auth()->user()->id;
    $sections_teacher=teacher_section::where('teacher_id',$teacher_id)->pluck('section_id');
    $num_sections=$sections_teacher->count();
    $students=student::wherein('section_id',$sections_teacher)->get();
    $num_students=$students->count();
      return view('teachers.dashboard',compact('num_sections','num_students'));
}


}
