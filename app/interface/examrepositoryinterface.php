<?php
namespace App\interface;

interface examrepositoryinterface{
    public function exams();
    public function create_exams();
    public function store_exams($request);
    public function edit_exams($id);
    public function update_exams($request);
    public function get_subject($id);
    public function delete_exams($request);


}
