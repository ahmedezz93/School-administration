@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{ trans('onlineclasses.Online classes') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('onlineclasses.Online classes') }}
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
                                <a href="{{ route('create_online_class') }}" class="btn btn-success" role="button" aria-pressed="true">{{ trans('onlineclasses.Add a new online class') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('grades.grade name') }}</th>
                                            <th>{{ trans('classrooms.class name') }}</th>
                                            <th>{{ trans('sections.section name') }}</th>
                                            <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('onlineclasses.class address') }}</th>
                                            <th> {{ trans('onlineclasses.Start Date') }}</th>
                                            <th> {{ trans('onlineclasses.class time') }}</th>
                                            <th>{{ trans('onlineclasses.Class link') }}</th>
                                            <th>{{ trans('grades.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($online_classes ))
                                            @foreach ( $online_classes as $online_class )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_class->grades->name }}</td>
                                                <td>{{ $online_class->classrooms->name }}</td>
                                                <td>{{ $online_class->sections->name }}</td>
                                                <td>{{ $online_class->created_by }}</td>
                                                <td>{{ $online_class->topic }}</td>
                                                <td>{{ $online_class->start_at }}</td>
                                                <td>{{ $online_class->duration }}</td>
                                                <td>
                                                <a href="{{ $online_class->join_url }}" style="color: red"> {{ trans('onlineclasses.Join now') }}</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_onlin_class{{ $online_class->meeting_id }}" title="{{ trans('buttons.delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                                        <td>
                                                         <!-- Deleted inFormation Student -->
<div class="modal fade" id="delete_onlin_class{{ $online_class->meeting_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('buttons.delete') }} {{$online_class->topic}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('destroy_online_class') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$online_class->id}}">
                    <input type="hidden" name="meeting_id" value="{{$online_class->meeting_id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;"> {{ trans('messages.question_message') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                                        </td>
                                            </tr>

                                            @endforeach
                                            @endif
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
