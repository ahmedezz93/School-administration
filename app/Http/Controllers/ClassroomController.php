<?php

namespace App\Http\Controllers;

use App\Http\Requests\classroomrequest;
use App\interface\classroomrepositoryinterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClassroomController extends Controller
{

protected $classroom;

    public function __construct(classroomrepositoryinterface $classroom)
    {
        $this->classroom = $classroom;
    }

    public function index()
    {
        return $this->classroom->index_classroom();
    }

    public function store(classroomrequest $request)
    {
        $validation=$request->validated();

        return $this->classroom->store_classroom($request);
    }

    public function update(classroomrequest $request){

        $validation=$request->validated();
        return $this->classroom->update_classroom($request);



    }

    public function destroy(Request $request){

        return $this->classroom->delete_class($request);



    }

    public function delete_chosen_classes(Request $request){

        return $this->classroom->delete_chosen_classes($request);



    }

    public function filter_classes(Request $request){

        return $this->classroom->filter_classes($request);


    }




}
