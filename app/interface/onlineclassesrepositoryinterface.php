<?php
namespace App\interface;

interface onlineclassesrepositoryinterface{

    public function index();
    public function create();
    public function store($request);
    public function destroy($request);

}
