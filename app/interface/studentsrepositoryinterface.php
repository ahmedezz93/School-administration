<?php
namespace App\interface;

interface studentsrepositoryinterface{

    public function index_students();
    public function add_student();
    public function get_classes($id);
    public function get_sections($id);
    public function store_student($request);
    public function edit_student($id);
    public function update_student($request);
    public function delete_student($request);
    public function filter_student($request);

}
