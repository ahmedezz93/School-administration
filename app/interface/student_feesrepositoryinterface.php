<?php
namespace App\interface;

interface student_feesrepositoryinterface{
    public function create_students_fees($id);
    public function get_price($id);
    public function store_students_fees($request);



}
