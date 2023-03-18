<?php
namespace App\interface;
 interface teacherrepositoryinterface{

    public function index_teachers();

    public function create_teachers();

    public function store_teachers($request);

    public function delete_teacher($request);

    public function edit_teacher($id);

    public function update_teacher($request);

    public function counts();


 }
