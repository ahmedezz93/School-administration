<?php

namespace App\Http\Controllers;

use App\Http\Traits\functionTraits;
use App\interface\sectionrepositoryinterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{


protected $sections;

    public function __construct(sectionrepositoryinterface $sections)
    {
        $this->sections = $sections;
    }


    public function index(){

        return $this->sections->index_sections();
    }



    public function create(Request $request){

        return $this->sections->create_section($request);

    }

    public function update(Request $request,$id){

        return $this->sections->update_section($request,$id);

    }

    public function destroy(Request $request,$id){

        return $this->sections->delete_section($request,$id);

    }

    public function get_class($id){

        return $this->sections->get_class($id);

    }



}
