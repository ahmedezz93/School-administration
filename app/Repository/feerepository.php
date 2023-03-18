<?php

namespace App\Repository;

use App\interface\feerepositoryinterface;
use App\Models\classroom;
use App\Models\fee;
use App\Models\grade;
use App\Models\section;

class feerepository implements feerepositoryinterface
{
    public function index_fees()
    {
        $fees = fee::all();
        return view('fees.fees', compact('fees'));
    }

    public function create_fees()
    {
        $grades = grade::all();
        return view('fees.add_fees', compact('grades'));
    }

    public function get_class($id)
    {
        $classrooms = classroom::where('grade_id', $id)->pluck('name', 'id');
        return json_encode($classrooms);
    }

    public function store_fees($request)
    {
        fee::create([
            'name' => ['ar' => $request->title_ar, 'en' => $request->title_en],
            'price' => $request->amount,
            'grade_id' => $request->Grade_id,
            'class_id' => $request->Classroom_id,
            'academic_year' => $request->year,
            'notes' => $request->description,
        ]);

        

        flash()->addsuccess(trans('messages.save_message'));
        return back();
    }

    public function delete_fees($request)
    {
        fee::where('id', $request->id)->delete();
        flash()->adderror(trans('messages.delete_message'));
        return back();
    }
    public function edit_fees($id)
    {
        $fee = fee::where('id', $id)->first();
        $data['grades']=grade::all();
        return view('fees.edit_fees', compact('fee'),$data);
    }

    public function update_fees($request)
    {
        fee::where('id', $request->id)->update([
            'name' => ['ar' => $request->title_ar, 'en' => $request->title_en],
            'price' => $request->amount,
            'grade_id' => $request->Grade_id,
            'class_id' => $request->Classroom_id,
            'academic_year' => $request->year,
            'notes' => $request->description,
        ]);


        flash()->addsuccess(trans('messages.update_message'));
        return back();
    }


}
