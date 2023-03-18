<?php
namespace App\interface;

interface dashboardteacherpositoryinterface{

    public function students_data();
    public function sections_teacher();
    public function attendance();
    public function store_attendance($request);
    public function attendance_reports();
    public function search_attendance($request);

}
