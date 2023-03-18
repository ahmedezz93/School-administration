<?php
namespace App\interface;

interface teacherexamrepositoryinterface{
    public function exams();
    public function create_exams();
    public function store_exams($request);
    public function edit_exams($id);
    public function update_exams($request);
    public function delete_exams($request);
    public function show_students_exams($id);
    public function repeat_exam($id);

}
