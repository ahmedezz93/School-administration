<?php

namespace App\Repository;

use App\interface\students_accountsrepositoryinterface;
use App\Models\payment;
use App\Models\student;
use App\Models\students_account;
use App\Models\students_fee;
use Illuminate\Support\Facades\DB;

class students_accountsrepository implements students_accountsrepositoryinterface
{
    public function students_accounts()
    {
        $students = student::all();
        return view('fees.students_accounts.students_accounts', compact('students'));
    }

    public function edit_students_accounts($id)
    {
        $student_accounts = students_account::where('id', $id)->first();
        return view('fees.students_accounts.edit', compact('student_accounts'));
    }

    public function update_students_accounts($request)
    {
        $payment = payment::where('id', $request->payment_id)->update([
            'credit' => $request->amount,
            'notes' => $request->description,
        ]);

        students_account::where('payment_id', $request->payment_id)->update([
            'Credit' => $request->amount,
            'notes' => $request->description,
        ]);
        flash()->addsuccess(trans('messages.update_message'));
        return back();
    }

    public function details_accounts($id)
    {
        $students = student::where('id', $id)->first();

        return view('fees.students_accounts.details', compact('students'));
    }

    public function delete_accounts($request)
    {
        students_account::where('student_id', $request->id)->delete();
        flash()->adderror(trans('messages.delete_message'));
        return back();
    }

    public function filter_account($id)
    {
        $student_account = students_account::where('student_id', $id)->first();
        return view('fees.students_accounts.filter_student_accounts', compact('student_account'));
    }

    public function update_filter_account($request){

students_account::create([

"Credit"=>$request->debit,
"student_id"=>$request->student_id,
"notes"=>$request->description,

]);

flash()->addsuccess(trans('messages.delete_message'));
return back();
}

}
