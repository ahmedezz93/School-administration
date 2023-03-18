<?php

namespace App\Repository;

use App\interface\student_feesrepositoryinterface;
use App\Models\classroom;
use App\Models\fee;
use App\Models\grade;
use App\Models\student;
use App\Models\students_account;
use App\Models\students_fee;
use Illuminate\Support\Facades\DB;

class students_feesrepository implements student_feesrepositoryinterface
{
    public function create_students_fees($id)
    {
        $student = student::where('id', $id)->first();
        $data['grades'] = grade::all();
        $data['fees'] = fee::where('grade_id', $student->grade_id)
            ->where('class_id', $student->classroom_id)
            ->get();

        return view('fees.students_fees.add', compact('student'), $data);
    }

    public function get_price($id)
    {
        $amount = fee::where('id', $id)->pluck('price', 'id');
        return json_encode($amount);
    }

    public function store_students_fees($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->List_Fees as $fee) {
                $students_fees = students_fee::create([
                    'student_id' => $fee['student_id'],
                    'fee_id' => $fee['fee_id'],
                    'debit' => $fee['price'],
                    'notes' => $fee['description'],
                ]);



                students_account::create([
                    'student_id' => $students_fees['student_id'],
                    'fee_id' => $students_fees['id'],
                    'Debit' => $students_fees['debit'],
                    'notes' => $students_fees['notes'],

                ]);
            }

            DB::commit();
            flash()->addsuccess(trans('messages.save_message'));
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }





}
