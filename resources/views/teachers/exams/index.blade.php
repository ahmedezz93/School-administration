@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('exams.list of exams')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('exams.list of exams')}}
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
                                <a href="{{ route('create_exam') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('exams.Add a new exam') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{ trans('exams.name of exam') }}</th>
                                            <th> {{ trans('Teacher_trans.Name_Teacher') }}</th>
                                            <th> {{ trans('grades.grade name') }}</th>
                                            <th> {{ trans('classrooms.class name') }}</th>
                                            <th>{{ trans('sections.section name') }}</th>
                                            <th>{{ trans('grades.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse (  $exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->name }}</td>
                                                <td>{{ $exam->teachers->name }}</td>
                                                <td>{{ $exam->grades->name }}</td>
                                                <td>{{ $exam->classrooms->name }}</td>
                                                <td>{{ $exam->sections->name }}</td>
                                                <td>
                                                    <a href="{{ route('edit_exam',$exam->id) }}" class="btn btn-info btn-sm" role="button" title="{{ trans('buttons.edit') }}" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_exam{{ $exam->id }}" title="{{ trans('buttons.delete') }}"><i class="fa fa-trash"></i></button>
                                                    <a href="{{ route('create_questions',$exam->id) }}" class="btn btn-warning btn-sm" role="button" title="{{ trans('questions.Add a new question') }}" aria-pressed="true"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('show_students_exams',$exam->id) }}" class="btn btn-warning btn-sm" role="button" title="{{ trans('exams.List of tested students') }}" aria-pressed="true"><i class="fa fa-user"></i></a>

                                                </td>
                                                      <td>
                                                        <div class="modal fade" id="delete_exam{{ $exam->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                           <div class="modal-dialog" role="document">
                                                               <form action="{{ route('delete_exam') }}" method="post">
                                                                  @csrf
                                                                   <div class="modal-content">
                                                                       <div class="modal-header">
                                                                           <h5 style="font-family: 'Cairo', sans-serif;"
                                                                               class="modal-title" id="exampleModalLabel">حذف اختبار</h5>
                                                                           <button type="button" class="close" data-dismiss="modal"
                                                                                   aria-label="Close">
                                                                               <span aria-hidden="true">&times;</span>
                                                                           </button>
                                                                       </div>
                                                                       <div class="modal-body">
                                                                           <p> {{ trans('messages.question_message') }}</p>
                                                                           <input type="hidden" name="id" value="{{ $exam->id }}">
                                                                       </div>
                                                                       <div class="modal-footer">
                                                                           <div class="modal-footer">
                                                                               <button type="button" class="btn btn-secondary"
                                                                                       data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                                               <button type="submit"
                                                                                       class="btn btn-danger">{{ trans('buttons.delete') }}</button>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </form>
                                                           </div>
                                                       </div>

                                                      </td>
                                            </tr>

                                            @empty
                                        {{ trans('messages.data not found') }}
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
