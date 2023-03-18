<?php
namespace App\interface;

interface attendancerepositoryinterface{
    public function sections();
    public function list_attendance($id);
    public function store_attendance($request);

}
