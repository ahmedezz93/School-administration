<?php

namespace App\Http\Controllers\teacher_dashboard;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileTeacherController extends Controller
{

public function index(){
$information=teacher::where('id',auth()->user()->id)->first();
    return view('teachers.profile.profile',compact('information'));
}


public function update(Request $request){

if(!empty($request->password)){

User::where('id',$request->id)->update([

"name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],
"password"=>$request->password,

]);

}

else{

    teacher::where('id',$request->id)->update([

        "name"=>["ar"=>$request->Name_ar,"en"=>$request->Name_en],

        ]);


}


flash()->addsuccess(trans('messages.update_message'));

return back();

}

}
