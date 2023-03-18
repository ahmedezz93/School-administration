<?php
namespace App\interface;

interface paymentrepositoryinterface{
    public function create_payment($id);
    public function store_payment($request);
    public function payments();
    public function edit_payment($id);
    public function update_payment($request);
    public function delete_payment($request);

}
