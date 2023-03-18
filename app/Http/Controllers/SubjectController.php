<?php

namespace App\Http\Controllers;

use App\Http\Requests\subjectrequest;
use App\interface\subjectrepositoryinterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subject;

    public function __construct(subjectrepositoryinterface $subject)
    {
        $this->subject = $subject;
    }


    public function index(){

        return $this->subject->index_subjects();
    }

    public function create(){

        return $this->subject->create_subjects();
    }

    public function store(subjectrequest $request){

        $request->validated();
        return $this->subject->store_subjects($request);
    }

    public function edit($id){

        return $this->subject->edit_subjects($id);
    }

    public function update(subjectrequest $request){

        $request->validated();
        return $this->subject->update_subjects($request);
    }

    public function destroy(Request $request){

        return $this->subject->delete_subjects($request);
    }




}
