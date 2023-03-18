@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{trans('main sidebar.List of academic subjects')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('main sidebar.List of academic subjects')}}
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
                                <a href="{{ route('create_subjects') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('subjects.Add a new subject') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{ trans('subjects.Subject Name') }}</th>
                                            <th>{{ trans('grades.grade name') }}</th>
                                            <th> {{ trans('classrooms.class name') }}</th>
                                            <th> {{ trans('Teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('sections.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($subjects as $subject )
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ $subject->grades->name }}</td>
                                                <td>{{ $subject->classrooms->name }}</td>
                                                <td>{{ $subject->teachers->name }}</td>
                                                <td>
                                                    <a href="{{ route('edit_subjects',$subject->id) }}" class="btn btn-info btn-sm" role="button" title="{{ trans('buttons.edit') }}" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="{{ trans('buttons.delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                                <td>
                                                    <div class="modal fade" id="delete_subject{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="{{ route('delete_subjects') }}" method="post">
                                                               @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('subjects.delete subject') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p> {{ trans('messages.question_message') }} </p>
                                                                    <input type="hidden" name="id"  value="{{ $subject->id }}">
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
                                        </tbody>
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
