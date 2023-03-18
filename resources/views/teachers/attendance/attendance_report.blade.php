@extends('layouts.master')
@section('css')

@section('title')
{{ trans('attendance.Attendance and absence reports') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('attendance.Attendance and absence reports') }}
@stop
<!-- breadcrumb -->

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('search_attendance') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('attendance.Search information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{ trans('main sidebar.students') }}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{ trans('attendance.All') }}</option>
                                    @foreach ( $students as $student )
                                         <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="{{ trans('attendance.Start Date') }}" required name="from">
                                <span class="input-group-addon">{{ trans('attendance.To date') }}</span>
                                <input class="form-control range-to date-picker-default" placeholder="{{ trans('attendance.Expiry date') }}" type="text" required name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>
                @if(isset($attendances))
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{trans('Students_trans.name')}}</th>
                            <th class="alert-success">{{trans('Students_trans.Grade')}}</th>
                            <th class="alert-success">{{trans('Students_trans.section')}}</th>
                            <th class="alert-success">{{ trans('attendance.todays date') }}</th>
                            <th class="alert-warning">{{ trans('sections.status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendances )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendances->students->name }}</td>
                                <td>{{ $attendances->grades->name }}</td>
                                <td>{{ $attendances->sections->name }}</td>
                                <td>{{ $attendances->date }}</td>
                                @if($attendances->attendance_status==1)
                                <td style="color: green">
                                                              {{ trans('attendance.existing') }}
                                </td>
                                @elseif($attendances->attendance_status==2)
                                <td style="color: red">{{trans('attendance.absent')}}</td>
                                 @endif
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
              @endif
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
