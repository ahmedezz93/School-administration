<?php

namespace App\Repository;

use App\interface\settingrepositoryinterface;
use App\Models\setting;

class settingrepository implements settingrepositoryinterface{


    public function index(){
$setting=setting::first();
return view('setting.index',compact('setting'));

    }



    public function update_setting($request){
setting::where('id',$request->id)->update([
"school_name"=>$request->school_name,
"current_year"=>$request->current_session,
"Abbreviated_school_name"=>$request->school_title,
"phone_number"=>$request->phone,
"email"=>$request->school_email,
"school_address"=>$request->address,
"The_end_of_the_first_term"=>$request->end_first_term,
"The_end_of_the_second_term"=>$request->end_second_term,
"file_name"=>$request->logo->getclientoriginalname(),
]);
flash()->addsuccess(trans('messages.save_message'));
return back();

    }


}
