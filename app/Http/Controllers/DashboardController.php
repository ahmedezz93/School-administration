<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use App\Models\student;
use App\Models\teacher;
use App\Models\the_parent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

public function index(){


$data['num_students']=student::count();
$data['num_teachers']=teacher::count();
$data['num_parents']=the_parent::count();
$data['num_classrooms']=classroom::count();
$data['students']=student::all();
$data['teachers']=teacher::all();
$data['the_parents']=the_parent::all();

    return view('dashboard',$data);
}
}
