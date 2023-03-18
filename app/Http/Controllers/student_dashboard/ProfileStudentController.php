<?php

namespace App\Http\Controllers\student_dashboard;

use App\Http\Controllers\Controller;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileStudentController extends Controller
{
    public function index(){
        $information=student::where('id',auth()->user()->id)->first();
            return view('students.profile.profile',compact('information'));
        }


        public function update(Request $request){

        if(!empty($request->password)){

            student::where('id',$request->id)->update([

        "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
        "password"=>$request->password,

        ]);

        }

        else{

            student::where('id',$request->id)->update([

                "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],

                ]);


        }


        flash()->addsuccess(trans('messages.update_message'));

        return back();

        }
        }
