<?php

namespace App\Repository;
use MacsiDigital\Zoom\Facades\Zoom;

use App\interface\onlineclassesrepositoryinterface;
use App\Models\grade;
use App\Models\online_classes;

class onlineclassesrepository implements onlineclassesrepositoryinterface
{

    public function index(){

        $online_classes=online_classes::where('created_by',auth()->user()->email)->get();
        return view('online_classes.index_onlineclass',compact('online_classes'));
    }


    public function create(){

        $grades=grade::all();

        return view('online_classes.add_onlineclass',compact('grades'));

    }


    public function store($request){

$user=Zoom::user()->first();
$meeting=Zoom::meeting()->make([

    'topic' => $request->topic,
    'duration' => $request->duration,
    'password' => $request->password,
    'start_time' => $request->start_time,
    'timezone' => config('zoom.timezone')
  // 'timezone' => 'Africa/Cairo'

]);

$meeting->settings()->make([
    'join_before_host' => true,
    'approval_type' => 1,
    'registration_type' => 2,
    'enforce_login' => false,
    'waiting_room' => false,
  ]);

   $user->meetings()->save($meeting);

online_classes::create([
"grade_id"=>$request->Grade_id,
"class_id"=>$request->Classroom_id,
"section_id"=>$request->section_id,
"created_by"=>auth()->user()->email,
"meeting_id"=>$meeting->id,
"topic"=>$meeting->topic,
"start_at"=>$meeting->start_time,
"duration"=>$meeting->duration,
"password"=>$meeting->password,
"start_url"=>$meeting->start_url,
"join_url"=>$meeting->join_url,

]);

flash()->addsuccess(trans('messages.save_message'));
return back();

    }

    public function destroy($request){

$meeting=zoom::meeting()->find($request->meeting_id);
$meeting->delete();

$online_class=online_classes::where('id',$request->id)->delete();
flash()->adderror(trans('messages.delete_message'));
return back();

    }


}
