<?php

namespace App\Http\Controllers;

use App\Http\Requests\feesrequest;
use App\interface\feerepositoryinterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $fees;

    public function __construct(feerepositoryinterface $fees)
    {
        $this->fees = $fees;
    }


    public function index()
    {
        return $this->fees->index_fees();
    }

    public function create()
    {
        return $this->fees->create_fees();
    }

    public function get_class($id){

        return $this->fees->get_class($id);

    }

    public function store(feesrequest $request)
    {
        $request->validated();
        return $this->fees->store_fees($request);
    }

    public function destroy(Request $request)
    {
        return $this->fees->delete_fees($request);
    }

    public function edit($id)
    {
        return $this->fees->edit_fees($id);
    }

    public function update(feesrequest $request)
    {
        $request->validated();

        return $this->fees->update_fees($request);
    }


}
