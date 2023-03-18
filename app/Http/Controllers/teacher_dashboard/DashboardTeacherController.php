<?php

namespace App\Http\Controllers\teacher_dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\attendancerequest;
use App\interface\dashboardteacherpositoryinterface;
use Illuminate\Http\Request;

class DashboardTeacherController extends Controller
{
    protected $dashboard;

    public function __construct(dashboardteacherpositoryinterface $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function students_data()
    {
        return $this->dashboard->students_data();
    }

    public function sections_teacher()
    {
        return $this->dashboard->sections_teacher();
    }

    public function attendance()
    {
        return $this->dashboard->attendance();
    }


    public function store_attendance(Request $request)
    {
        return $this->dashboard->store_attendance($request);

    }

    public function attendance_reports()
    {
        return $this->dashboard->attendance_reports();

    }

    public function search_attendance(attendancerequest $request)
    {
        $request->validated();

        return $this->dashboard->search_attendance($request);

    }



}
