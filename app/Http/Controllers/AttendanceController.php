<?php

namespace App\Http\Controllers;

use App\interface\attendancerepositoryinterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendance;

    public function __construct(attendancerepositoryinterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function index()
    {
        return $this->attendance->sections();

    }

    public function create($id)
    {
        return $this->attendance->list_attendance($id);

    }

    public function store(Request $request)
    {
        return $this->attendance->store_attendance($request);

    }

    

}
