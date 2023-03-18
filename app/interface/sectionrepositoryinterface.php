<?php
namespace App\interface;

interface sectionrepositoryinterface{

    public function index_sections();
    public function get_class($id);
    public function update_section($request,$id);
    public function delete_section($request,$id);
    public function create_section($request);

}
