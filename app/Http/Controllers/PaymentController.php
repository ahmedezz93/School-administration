<?php

namespace App\Http\Controllers;

use App\interface\paymentrepositoryinterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payments;

    public function __construct(paymentrepositoryinterface $payments)
    {
        $this->payments = $payments;
    }


    public function create($id){

        return $this->payments->create_payment($id);

    }

    public function store(Request $request){

        return $this->payments->store_payment($request);

    }

    public function index(){

        return $this->payments->payments();

    }

    public function edit($id){

        return $this->payments->edit_payment($id);

    }

    public function update(Request $request){

        return $this->payments->update_payment($request);

    }
    public function destroy(Request $request){

        return $this->payments->delete_payment($request);

    }



}
