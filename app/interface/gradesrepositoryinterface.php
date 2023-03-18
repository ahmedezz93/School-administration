<?php
namespace App\interface;

interface gradesrepositoryinterface{

public function index_grade();
public function store_grade($request);
public function update_grade($request);
public function delete_grade($id);

}


