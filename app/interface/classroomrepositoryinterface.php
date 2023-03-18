<?php
namespace App\interface;

interface classroomrepositoryinterface{
    public function index_classroom();
    public function store_classroom($request);
    public function update_classroom($request);
    public function delete_class($request);
    public function delete_chosen_classes( $request);
    public function filter_classes( $request);


}
