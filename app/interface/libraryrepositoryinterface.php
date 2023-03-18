<?php
namespace App\interface;

interface libraryrepositoryinterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function destroy($request);
    public function update($request);


}
