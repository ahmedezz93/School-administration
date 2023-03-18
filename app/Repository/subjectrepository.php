<?php

namespace App\Repository;

use App\interface\subjectrepositoryinterface;
use App\Models\grade;
use App\Models\subject;
use App\Models\teacher;

class subjectrepository implements subjectrepositoryinterface
{

    public function index_subjects(){

        $subjects=subject::all();
        return view('subjects.index',compact('subjects'));
    }

    public function create_subjects(){

$data['grades']=grade::all();
$data['teachers']=teacher::all();


        return view('subjects.create',$data);
    }

    public function store_subjects($request){
$subjects=subject::where("name->ar",$request->Name_ar)->where("name->en",$request->Name_en)->where('grade_id',$request->Grade_id)->where('class_id',$request->Class_id)->get();
if($subjects->count()>0){
    flash()->adderror(trans('validation.unique'));
    return back();
}

else{
    subject::create([

        "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
        "grade_id"=>$request->Grade_id,
        "class_id"=>$request->Class_id,
        "teacher_id"=>$request->teacher_id,
    ]);

    flash()->addsuccess(trans('messages.save_message'));
    return back();

}
    }


    public function edit_subjects($id){

        $subject=subject::where('id',$id)->first();
        $grades=grade::all();
        $teachers=teacher::all();
        return view('subjects.edit',compact('subject','grades','teachers'));

    }

    public function update_subjects($request){
        $subjects=subject::where("name->ar",$request->Name_ar)->where("name->en",$request->Name_en)->where('grade_id',$request->Grade_id)->where('class_id',$request->Class_id)->get();
        if($subjects->count()>0){
            flash()->adderror(trans('validation.unique'));
            return back();
        }
else{
    subject::where('id',$request->id)->update([

        "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
        "grade_id"=>$request->Grade_id,
        "class_id"=>$request->Class_id,
        "teacher_id"=>$request->teacher_id,



    ]);

    flash()->addsuccess(trans('messages.update_message'));
    return redirect()->route('subjects');


}
    }

    public function delete_subjects($request){

        subject::where('id',$request->id)->delete();
        flash()->adderror(trans('messages.delete_message'));
        return back();
    }
}
