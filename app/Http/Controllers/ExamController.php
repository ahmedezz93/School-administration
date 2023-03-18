<?php

namespace App\Http\Controllers;

use App\Http\Requests\examrequest;
use App\interface\examrepositoryinterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    protected $exam;

    public function __construct(examrepositoryinterface $exam)
    {
        $this->exam = $exam;
    }

    public function index()
    {
        return $this->exam->exams();

    }

    public function create()
    {
        return $this->exam->create_exams();

    }

    public function store(examrequest $request)
    {
        $request->validated();
        return $this->exam->store_exams($request);

    }

    public function edit($id)
    {
        return $this->exam->edit_exams($id);

    }


    public function update(examrequest $request)
    {

        $request->validated();
        return $this->exam->update_exams($request);

    }

    public function get_subject($id)
    {
        return $this->exam->get_subject($id);

    }

    public function destroy(Request $request)
    {
        return $this->exam->delete_exams($request);

    }


}
