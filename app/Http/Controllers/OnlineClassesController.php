<?php

namespace App\Http\Controllers;

use App\interface\onlineclassesrepositoryinterface;
use Illuminate\Http\Request;

class OnlineClassesController extends Controller
{
    protected $online_classes;

    public function __construct(onlineclassesrepositoryinterface $online_classes)
    {
        $this->online_classes = $online_classes;
    }

    public function index()
    {

return $this->online_classes->index();

}

public function create()
{

return $this->online_classes->create();

}

public function store(Request $request)
{

return $this->online_classes->store($request);

}

public function destroy(Request $request)
{

return $this->online_classes->destroy($request);

}


}
