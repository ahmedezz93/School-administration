<?php

namespace App\Http\Controllers\the_parent_dashboard;

use App\Http\Controllers\Controller;
use App\Models\the_parent;
use Illuminate\Http\Request;

class ProfileParentController extends Controller
{

    public function index(){
        $information=the_parent::where('id',auth()->user()->id)->first();
            return view('the_parents.profile.profile',compact('information'));
        }


        public function update(Request $request){

        if(!empty($request->password)){

        the_parent::where('id',$request->id)->update([

        "name_Father"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
        "password"=>$request->password,

        ]);

        }

        else{

            the_parent::where('id',$request->id)->update([

                "name_Father"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],

                ]);


        }


        flash()->addsuccess(trans('messages.update_message'));

        return back();

        }
        }
