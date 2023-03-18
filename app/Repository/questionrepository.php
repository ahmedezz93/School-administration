<?php

namespace App\Repository;

use App\interface\questionrepositoryinterface;
use App\Models\exam;
use App\Models\question;

class questionrepository implements questionrepositoryinterface
{

    public function show($id){

        $questions=question::where('exam_id',$id)->get();
        $exam=exam::where('id',$id)->first();
        return view('teachers.questions.index',compact('questions','exam'));

    }


    public function store_question($request){

        question::create([

            "title"=>$request->title,
            "answers"=>$request->answers,
            "right_answer"=>$request->right_answer,
            "score"=>$request->score,
            "exam_id"=>$request->quizze_id,
        ]);

        flash()->addsuccess(trans('messages.save_message'));
        return back();

    }
    public function edit_question($id){

        $question=question::where('id',$id)->first();
        $exams=exam::all();
        return view('teachers.questions.edit',compact('question','exams'));
    }


    public function update_question($request)
    {

        question::where('id',$request->id)->update([

            "title"=>$request->title,
            "answers"=>$request->answers,
            "right_answer"=>$request->right_answer,
            "score"=>$request->score,
            "exam_id"=>$request->quizze_id,
        ]);

        flash()->addsuccess(trans('messages.update_message'));
        return back();
    }


    public function create_question($id)
    {
        $exam= exam::where('id',$id)->first();

        return view('teachers.questions.create',compact('exam'));

    }

    public function destroy_question($request)
    {

        question::where('id',$request->id)->delete();
        flash()->adderror(trans('messages.delete_message'));
        return back();
    }

}
