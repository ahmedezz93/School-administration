<?php

namespace App\Http\Controllers;

use App\Http\Requests\libraryrequest;
use App\interface\libraryrepositoryinterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $library;

    public function __construct(libraryrepositoryinterface $library)
    {
        $this->library = $library;
    }

    public function index()
    {
        return $this->library->index();
    }


    public function create()
    {
        return $this->library->create();
    }

    public function store(libraryrequest $request)
    {
        $request->validated();
        return $this->library->store($request);
    }

    public function edit($id)
    {
        return $this->library->edit($id);
    }


    public function destroy(Request $request)
    {
        return $this->library->destroy($request);
    }


    public function update(libraryrequest $request)
    {
        $request->validated();

        return $this->library->update($request);
    }


}
