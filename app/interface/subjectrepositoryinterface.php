<?php
namespace App\interface;

interface subjectrepositoryinterface{

    public function index_subjects();
    public function create_subjects();
    public function store_subjects($request);
    public function edit_subjects($id);
    public function update_subjects($request);
    public function delete_subjects($request);


}
