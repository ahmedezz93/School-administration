<?php

namespace App\Http\Controllers\teacher_dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\examrequest;
use App\interface\teacherexamrepositoryinterface;
use Illuminate\Http\Request;

class TeacherExamController extends Controller
{
    protected $exam;

    public function __construct(teacherexamrepositoryinterface $exam)
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

    public function destroy(Request $request)
    {
        return $this->exam->delete_exams($request);

    }

    public function show_students_exams($id)
    {
        return $this->exam->show_students_exams($id);

    }


    public function repeat_exam($id)
    {
        return $this->exam->repeat_exam($id);

    }



}
