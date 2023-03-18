<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentrequest;
use App\interface\studentsrepositoryinterface;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $students;

    public function __construct(studentsrepositoryinterface $students)
    {
        $this->students = $students;
    }


    public function index(){

        return $this->students->index_students();
    }

    public function create(){

        return $this->students->add_student();


    }

    public function get_class($id){

        return $this->students->get_classes($id);


    }

    public function get_section($id){

        return $this->students->get_sections($id);


    }



    public function store(studentrequest $request){
             $request->validated();
        return $this->students->store_student($request);


    }


    public function edit($id){

        return $this->students->edit_student($id);


    }

    public function update(studentrequest $request){
        $request->validated();
        return $this->students->update_student($request);


    }

    public function destroy(Request $request){
        return $this->students->delete_student($request);

    }


    public function filter_student(Request $request){

        return $this->students->filter_student($request);


    }



}
