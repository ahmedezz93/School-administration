<?php
namespace App\interface;

interface questionrepositoryinterface{


    public function show($id);
    public function store_question($request);
    public function edit_question($id);
    public function update_question($request);
    public function create_question($id);
    public function destroy_question($request);

}
