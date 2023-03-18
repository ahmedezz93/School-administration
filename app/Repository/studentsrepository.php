<?php

namespace App\Repository;

use App\interface\studentsrepositoryinterface;
use App\Models\blood;
use App\Models\classroom;
use App\Models\gender;
use App\Models\grade;
use App\Models\image;
use App\Models\nationalitie;
use App\Models\section;
use App\Models\student;
use App\Models\the_parent;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class studentsrepository implements studentsrepositoryinterface
{
    public function index_students(){


        $students=student::all();
        $data['grades']=grade::all();
         return view('students.students',compact('students'),$data);

    }


    public function add_student(){

        $data['genders']=gender::all();
        $data['grades']=grade::all();
        $data['bloods']=blood::all();
        $data['nationalities']=nationalitie::all();
        $data['all_parents']=the_parent::all();


        return view('students.add_student',$data);

   }

   public function get_classes($id){

    $classes=classroom::where('grade_id',$id)->pluck('name','id');
    return json_encode($classes);


  }


  public function get_sections($id){

    $classes=section::where('class_id',$id)->pluck('name','id');
    return json_encode($classes);


  }

  public function store_student($request){

$student=student::create([
"name"=>["ar"=>$request->name_ar,"en"=>$request->name_en],
"email"=>$request->email,
"password"=>Hash::make($request->password),
"gender_id"=>$request->gender_id,
"nationalitie_id"=>$request->nationalitie_id,
"blood_id"=>$request->blood_id,
"date_birth"=>$request->Date_Birth,
"grade_id"=>$request->Grade_id,
"classroom_id"=>$request->Classroom_id,
"section_id"=>$request->section_id,
"parent_id"=>$request->parent_id,
"academic_year"=>$request->academic_year,

]);

if($request->hasfile('photos')){

         $photos=$request->file('photos');
    foreach($photos as $photo){

          $image_name=$photo->getclientoriginalname();
          $photo->storeAs("/".$student['name'],$image_name,'upload_files');

    }


    image::create([

       "imageable_id"=>$student->id,
       "imageable_type"=>student::class,
    ]);
}

flash()->addsuccess(trans('messages.save_message'));
return back();

  }


  public function edit_student($id){

$data['student']=student::where('id',$id)->first();
    $data['genders']=gender::all();
    $data['grades']=grade::all();
    $data['bloods']=blood::all();
    $data['nationalities']=nationalitie::all();
    $data['all_parents']=the_parent::all();
    $data['classrooms']=classroom::all();
    $data['sections']=section::all();


    return view('students.edit',$data);

  }

  public function update_student($request){
    student::where('id',$request->id)->update([
   "name"=>["ar"=>$request->name_ar,"en"=>$request->name_en],
   "email"=>$request->email,
   "password"=>Hash::make($request->password),
   "gender_id"=>$request->gender_id,
   "nationalitie_id"=>$request->nationalitie_id,
   "blood_id"=>$request->blood_id,
   "date_birth"=>$request->Date_Birth,
   "grade_id"=>$request->Grade_id,
   "classroom_id"=>$request->Classroom_id,
   "section_id"=>$request->section_id,
   "parent_id"=>$request->parent_id,
   "academic_year"=>$request->academic_year,
    ]);

    flash()->addsuccess(trans('messages.update_message'));
    return back();
  }

  public function delete_student($request){


    $student=student::find($request->id);
    $folder_name=$student->name;
 if(File::exists(public_path('assets/images/'.$folder_name))){

  File::deleteDirectory(public_path('assets/images/'.$folder_name));

   }
image::where('imageable_id',$request->id)->delete();
    student::where('id',$request->id)->delete();
    flash()->adderror(trans('messages.delete_message'));
    return back();

  }

  public function filter_student($request)
  {

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


}
