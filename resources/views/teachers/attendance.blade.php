@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{trans('attendance.List of attendance and absence')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('attendance.List of attendance and absence')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif



    <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('attendance.todays date') }} : {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('attendance_students') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ( $students as $student )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->genders->name }}</td>
                    <td>{{ $student->grades->name }}</td>
                    <td>{{ $student->classrooms->name }}</td>
                    <td>{{ $student->sections->name }}</td>
                    <td>

                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                            <input name="attendances[{{ $student->id }}]" class="leading-tight"
                            type="radio"
                                 @foreach ($student->attendances()->where('date',date('Y-m-d'))->get() as $attendance)
                                 @if ($attendance->attendance_status==1)
                                     {{ "checked" }}
                                     @else
                                     {{ "" }}
                                 @endif

                                 @endforeach

                                   value="absent">
                            <span class="text-success">{{ trans('attendance.existing') }}</span>

                        </label>

                        <label class="ml-4 block text-gray-500 font-semibold">
                            <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                            @foreach ($student->attendances()->where('date',date('Y-m-d'))->get() as $attendance)
                            @if ($attendance->attendance_status==2)
                                {{ "checked" }}
                                @else
                                {{ "" }}
                            @endif

                            @endforeach


                            value="notexist">
                            <span class="text-danger">{{ trans('attendance.absent') }}</span>
                        </label>
                                      </td>

                                      <td>
                                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                            <input type="hidden" name="grade_id" value="{{ $student->grade_id}}">
                                            <input type="hidden" name="class_id" value="{{ $student->classroom_id}}">
                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                                      </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
