<?php

namespace App\Http\Controllers;

use App\Http\Requests\graderequest;
use App\interface\gradesrepositoryinterface;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    protected $grades;

    public function __construct(gradesrepositoryinterface $grades)
    {
        $this->grades = $grades;
    }

    public function index()
    {
        return $this->grades->index_grade();
    }

    public function store(graderequest $request)
    {
        $validated = $request->validated();

        return $this->grades->store_grade($request);
    }

    public function update(graderequest $request)
    {
        $validated = $request->validated();

        return $this->grades->update_grade($request);
    }

    public function destroy($id)
    {
        return $this->grades->delete_grade($id);
    }
}
