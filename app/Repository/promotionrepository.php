<?php

namespace App\Repository;

use App\interface\promotionrepositoryinterface;
use App\Models\classroom;
use App\Models\grade;
use App\Models\promotion;
use App\Models\section;
use App\Models\student;
use Illuminate\Support\Facades\DB;

class promotionrepository implements promotionrepositoryinterface
{
    public function promotion_index()
    {
        $data['grades'] = grade::all();
        $data['sections'] = section::all();
        $data['classrooms'] = classroom::all();
        return view('promotions.index', $data);
    }

    public function promotion_store($request)
    {
        DB::beginTransaction();

        try {
            $students = student::where('grade_id', $request->Grade_id)
                ->where('classroom_id', $request->Classroom_id)
                ->where('section_id', $request->section_id)
                ->where('academic_year', $request->academic_year)
                ->get();
if($students->count()<1){
flash()->adderror(trans('messages.data not found'));
return back();

}
else{

    foreach ($students as $student) {
        $ids=explode(',',$student->id);
        student::wherein('id', $ids)->update([
          "grade_id"=>$request->Grade_id_new,
          "classroom_id"=>$request->Classroom_id_new,
          "section_id"=>$request->section_id_new,
          "academic_year"=>$request->academic_year_new,
        ]);

           promotion::updateOrCreate([
               'student_id' => $student->id,
               'from_grade' => $request->Grade_id,
               'from_class' => $request->Classroom_id,
               'from_section' => $request->section_id,
               'to_grade' => $request->Grade_id_new,
               'to_class' => $request->Classroom_id_new,
               'to_section' => $request->section_id_new,
               'from_date' => $request->academic_year,
               'to_date' => $request->academic_year_new,

           ]);

       }
       DB::commit();
       flash()->addsuccess(trans('messages.save_message'));
       return back();

}

        }


        catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}
