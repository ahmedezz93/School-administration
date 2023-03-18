<?php

namespace App\Http\Controllers\teacher_dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\questionrequest;
use App\interface\questionrepositoryinterface;
use App\Models\exam;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    protected $questions;

    public function __construct(questionrepositoryinterface $questions)
    {
        $this->questions = $questions;
    }


    public function show($id)
    {


        return $this->questions->show($id);

    }


    public function store(questionrequest $request)
    {
$request->validated();

        return $this->questions->store_question($request);

    }

    public function edit($id)
    {


        return $this->questions->edit_question($id);

    }


    public function update(questionrequest $request)
    {

        $request->validated();
        return $this->questions->update_question($request);

    }

    public function create_question($id)
    {


        return $this->questions->create_question($id);

    }
    public function destroy(Request $request)
    {


        return $this->questions->destroy_question($request);

    }



}
