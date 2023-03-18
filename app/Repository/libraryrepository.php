<?php

namespace App\Repository;

use App\interface\libraryrepositoryinterface;
use App\Models\grade;
use App\Models\library;
use Illuminate\Support\Facades\Storage;

class libraryrepository implements libraryrepositoryinterface
{
    public function index()
    {
        $books = library::all();

        return view('library.library', compact('books'));
    }

    public function create()
    {
        $grades = grade::all();

        return view('library.create_library', compact('grades'));
    }

    public function store($request)
    {

        $file = $request->file('file_name');
        $file_name = $file->getclientoriginalname();
        $library=library::where('file_name',$file_name)->where('grade_id',$request->Grade_id)->where('class_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if($library->count()>0){

            flash()->adderror(trans('validation.exists'));
            return back();
        }
        else{

            $file->storeAs('books/', $file_name, 'upload_books');
            library::create([
                'title' => $request->title,
                'file_name' => $file_name,
                'teacher_id' => auth()->user()->id,
                'grade_id' => $request->Grade_id,
                'class_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
            ]);

            flash()->addsuccess(trans('messages.save_message'));
            return back();

        }
    }

    public function edit($id)
    {


        $book = library::where('id', $id)->first();
        return view('library.edit_library', compact('book'));
    }



    public function destroy($request)
    {
        $file = $request->file_name;
        $exists = Storage::disk('upload_books')->exists('books/' . $file);
        if ($exists) {
            storage::disk('upload_books')->delete('books/' . $file);
        }

        library::where('id', $request->id)->delete();
        flash()->adderror(trans('messages.delete_message'));
        return back();
    }


    public function update($request)
    {

        $old_file=$request->old_file_name;
        $file=$request->file('file_name');
        $file_name=$file->getclientoriginalname();

        $library=library::where('file_name',$file_name)->where('grade_id',$request->Grade_id)->where('class_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if($library->count()>0){
            flash()->adderror(trans('validation.exists'));
            return back();
        }

        else{
            if($old_file != $file_name){

                $exists=storage::disk('upload_books')->exists('books/' . $old_file);
                if($exists){

                    Storage::disk('upload_books')->delete('books/' . $old_file);
                }
                $file->storeAs('books/', $file_name, 'upload_books');
                 $the_file=$file_name;
              }

        elseif($old_file = $file_name){
            $the_file=$old_file;

        }

        library::where('id',$request->id)->update([

        "title"=>$request->title,
        "file_name"=>$the_file,
        "teacher_id"=>auth()->user()->id,
        "grade_id"=>$request->Grade_id,
        "class_id"=>$request->Classroom_id,
        "section_id"=>$request->section_id,
        ]);


        }


    }
}
