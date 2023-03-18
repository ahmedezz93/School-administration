<?php

namespace App\Repository;

use App\interface\sectionrepositoryinterface;
use App\Models\classroom;
use App\Models\grade;
use App\Models\section;
use App\Models\teacher;

class sectionrepository implements sectionrepositoryinterface{
public function index_sections(){

    $grades=grade::with(['sections'])->get();
    $teachers=teacher::all();
return view('sections.sections',compact('grades','teachers'));

}

public function get_class($id){

$classrooms=classroom::where('grade_id',$id)->pluck('name','id');
return json_encode($classrooms);

}

public function create_section($request){

$sections=section::create([

"name"=>["ar"=>$request->Name_Section_Ar,"en"=>$request->Name_Section_En],
"grade_id"=>$request->Grade_id,
"class_id"=>$request->Class_id,
"notes"=>$request->Notes,
]);

$sections->teachers()->attach($request->teacher_id);
flash()->addsuccess(trans('messages.save_message'));
return back();

}

public function update_section($request,$id){

    $sections=section::findorfail($request->id);

    $sections->name=["ar"=>$request->section_ar,"en"=>$request->section_en];

    $sections->grade_id=$request->grade;

    $sections->class_id=$request->class;

    $sections->status=$request->status;

    if(isset($request->teacher_id)){

    $sections->teachers()->sync($request->teacher_id);

    }

    else{

        $sections->teachers()->sync(array());
    }

    $sections->save();
    flash()->addsuccess(trans('messages.update_message'));
return back();

}

public function delete_section($request,$id){

    section::where('id',$id)->delete();
    flash()->adderror(trans('messages.delete_message'));
    return back();


}

}
