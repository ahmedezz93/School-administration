@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('questions.List of questions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('questions.List of questions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h3>{{trans('questions.List of questions') . ":" .$exam->name }}</h3>
                                <a href="{{ route('create_question',$exam->id) }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('questions.Add a new question') }}
                                </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('questions.Question') }}</th>
                                            <th scope="col">{{ trans('questions.Answers') }}</th>
                                            <th scope="col">{{ trans('questions.The correct answer') }}</th>
                                            <th scope="col">{{ trans('questions.Grade') }}</th>
                                            <th scope="col">{{ trans('questions.Test Name') }}</th>
                                            <th scope="col">{{ trans('grades.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($questions as $question )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->title }}</td>
                                                <td>{{ $question->answers }}</td>
                                                <td>{{ $question->right_answer }}</td>
                                                <td>{{ $question->score }}</td>
                                                <td>{{ $question->exams->name }}</td>

                                                <td>
                                                    <a href="{{ route('edit_question',$question->id) }}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                       title="{{ trans('buttons.edit') }}"  class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#destroy_exam{{$question->id}}" title="{{ trans('buttons.delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                                <td>
                                                    <div class="modal fade" id="destroy_exam{{$question->id}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog" role="document">
                                                           <form action="{{route('destroy_question')}}" method="post">
                                                                @csrf
                                                               <div class="modal-content">
                                                                   <div class="modal-header">
                                                                       <h5 style="font-family: 'Cairo', sans-serif;"
                                                                           class="modal-title" id="exampleModalLabel">حذف سؤال</h5>
                                                                       <button type="button" class="close" data-dismiss="modal"
                                                                               aria-label="Close">
                                                                           <span aria-hidden="true">&times;</span>
                                                                       </button>
                                                                   </div>
                                                                   <div class="modal-body">
                                                                       <p> {{ trans('messages.question_message') }} {{$question->name}}</p>
                                                                       <input type="hidden" name="id" value="{{$question->id}}">
                                                                   </div>
                                                                   <div class="modal-footer">
                                                                       <div class="modal-footer">
                                                                           <button type="button" class="btn btn-secondary"
                                                                                   data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                                           <button type="submit" class="btn btn-danger">{{ trans('buttons.delete') }}</button>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </form>
                                                       </div>
                                                   </div>

                                                </td>
                                            </tr>

                                            @empty

                                            @endforelse


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
