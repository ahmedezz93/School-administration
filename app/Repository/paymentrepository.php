<?php

namespace App\Repository;

use App\interface\paymentrepositoryinterface;
use App\Models\payment;
use App\Models\student;
use App\Models\students_account;
use Illuminate\Support\Facades\DB;

class paymentrepository implements paymentrepositoryinterface
{
    public function create_payment($id)
    {
        $student = student::where('id', $id)->first();
        return view('fees.payment_fees.add_payment', compact('student'));
    }

    public function store_payment($request)
    {
        DB::beginTransaction();

        try {
            $payment = payment::create([
                'student_id' => $request->student_id,
                'credit' => $request->credit,
                'notes' => $request->description,
            ]);

            students_account::create([
                'student_id' => $payment->student_id,
                'payment_id' => $payment->id,
                'Credit' => $payment->credit,
                'notes' => $payment->notes,
            ]);
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



      public function payments(){
          $payments=payment::all();
        return view('fees.payment_fees.index',compact('payments'));

      }

      public function edit_payment($id){
      $payment=payment::where('id',$id)->first();
        return view('fees.payment_fees.edit_payment',compact('payment'));


      }

      public function update_payment($request){
DB::beginTransaction();
try{
    payment::where('id',$request->id)->where('student_id',$request->student_id)->update([
        "credit"=>$request->credit,
        "notes"=>$request->description,

                 ]);

                 students_account::where('payment_id',$request->id)->where('student_id',$request->student_id)->update([

                    "Credit"=>$request->credit,
                    "notes"=>$request->description,
                             ]);
DB::commit();
        flash()->addsuccess(trans('messages.update_message'));
        return back();

}

catch (\Exception $e) {
    DB::rollBack();
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
}
      }

      public function delete_payment($request){
        DB::beginTransaction();
        try{

        payment::where('id',$request->id)->where('student_id',$request->student_id)->delete();
        students_account::where('payment_id',$request->id)->where('student_id',$request->student_id)->delete();
        DB::commit();
        flash()->adderror(trans('messages.delete_message'));
        return back();

        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

      }

}
