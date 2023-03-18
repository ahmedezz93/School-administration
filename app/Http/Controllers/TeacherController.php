<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacherrequest;
use App\interface\teacherrepositoryinterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(teacherrepositoryinterface $teacher)
    {
        $this->teacher = $teacher;
    }


    public function index(){

        return $this->teacher->index_teachers();
    }


    public function create(){

        return $this->teacher->create_teachers();
    }


    public function store(teacherrequest $request){
           $request->validated();
        return $this->teacher->store_teachers($request);

    }


    public function destroy(Request $request){

        return $this->teacher->delete_teacher($request);
    }
    public function edit($id){

        return $this->teacher->edit_teacher($id);

    }


    public function update(teacherrequest $request){

          $request->validated();
        return $this->teacher->update_teacher($request);

    }


    public function counts(){

        return $this->teacher->counts();

    }


}
