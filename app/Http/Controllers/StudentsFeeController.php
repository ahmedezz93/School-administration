<?php

namespace App\Http\Controllers;

use App\interface\student_feesrepositoryinterface;
use Illuminate\Http\Request;

class StudentsFeeController extends Controller
{
    protected $students_fees;

    public function __construct(student_feesrepositoryinterface $students_fees)
    {
        $this->students_fees = $students_fees;
    }


public function create($id){

    return $this->students_fees->create_students_fees($id);


}

public function get_price($id){

    return $this->students_fees->get_price($id);


}

public function store(Request $request){

    return $this->students_fees->store_students_fees($request);


}

}
