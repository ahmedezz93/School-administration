<?php

namespace App\Repository;

use App\interface\gradesrepositoryinterface;
use App\Models\grade;
use Flasher\Noty\Laravel\Facade\Noty;
use Flasher\Noty\Prime\NotyFactory;
use Flasher\Prime\Flasher;

class gradesrepository implements gradesrepositoryinterface
{
    public function index_grade()
    {

        $grades=grade::all();
        return view('grades.grades',compact('grades'));
    }

    public function store_grade($request)
    {
        grade::create([
            'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],
            'notes' => $request->Notes,
        ]);

        Flash()->addSuccess(trans('messages.save_message'));
        return back();
    }


public function update_grade($request){


grade::where('id',$request->id)->update([

    'name' => ['ar' => $request->Name_ar, 'en' => $request->Name_en],

    'notes' => $request->Notes,


]);

Flash()->addSuccess(trans('messages.update_message'));
return back();

}

public function delete_grade($id){
    
grade::where("id",$id)->delete();
Flash()->addError(trans('messages.delete_message'));
return back();

}



}
