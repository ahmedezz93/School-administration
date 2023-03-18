<?php
namespace App\interface;

interface feerepositoryinterface{

    public function index_fees();
    public function create_fees();
    public function get_class($id);
    public function store_fees($request);
    public function delete_fees($request);
    public function edit_fees($id);
    public function update_fees($request);


}
