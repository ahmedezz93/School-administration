@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
{{ trans('exams.List of tested students') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    {{ trans('exams.List of tested students') }}
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
                                <h4>{{ trans('exams.List of tested students') }}
                                </h4>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Students_trans.name') }}</th>
                                            <th>{{ trans('questions.Grade') }}</th>
                                            <th>{{ trans('grades.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $degrees as $degree)
                                            <tr>

                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $degree->students->name }}</td>
                                                   <td>{{ $degree->score }}</td>
                                                   <td>
                                                    <a href="{{ route('repeat_exam',$degree->id) }}" class="btn btn-warning btn-sm" role="button" title="{{ trans('exams.Retest') }}" aria-pressed="true"><i class="fa fa-repeat"></i></a>
                                                   </td>

                                            </tr>

                                            @endforeach

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
