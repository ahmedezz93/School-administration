<?php

namespace App\Http\Controllers;

use App\interface\settingrepositoryinterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(settingrepositoryinterface $setting)
    {
        $this->setting = $setting;
    }

    public function index(){

        return $this->setting->index();
    }

    public function update(Request $request){

        return $this->setting->update_setting($request);
    }



}
