<?php

namespace App\Repository;

use App\interface\classroomrepositoryinterface;
use App\Models\classroom;
use App\Models\grade;

class classroomrepository implements classroomrepositoryinterface{

public function index_classroom(){


    $grades=grade::all();
    $classes=classroom::all();
return view('classrooms.classrooms',compact('grades','classes'));


}

public function store_classroom($request){

    $classes= $request->List_Classes;


   foreach($classes as $class){


    {


classroom::create([



"name"=>["ar"=>$class['Name_class_ar'],"en"=>$class['Name_class_en']],

"grade_id"=>$class['Grade_id'],

]);



   }
}
Flash()->addSuccess(trans('messages.save_message'));
return back();

}

public function update_classroom($request)
{
classroom::where('id',$request->class_id)->update([
"name"=>["ar"=>$request->Name_class_ar,"en"=>$request->Name_class_en],
"grade_id"=>$request->Grade_id,

]);

flash()->addsuccess(trans('messages.update_message'));
return back();


}

public function delete_class($request)
{
    classroom::where('id',$request->class_id)->delete();
    flash()->adderror(trans('messages.delete_message'));
return back();

}


public function delete_chosen_classes($request)
{

$classes_id=explode(',',$request->delete_all_id);

classroom::wherein('id',$classes_id)->delete();

flash()->adderror(trans('messages.delete_message'));
return back();


}

public function filter_classes($request)
{

$classes=classroom::where('grade_id',$request->Grade_id)->get();
$grades=grade::all();

return view('classrooms.classrooms',compact('grades','classes'));
}




}
