@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل اختبار {{$exam->name}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل اختبار {{$exam->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('update_exams') }}" method="post">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('exams.exam name in Arabic') }} </label>
                                        <input type="text" name="Name_ar" value="{{$exam->getTranslation('name','ar')}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$exam->id}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('exams.exam name in english') }}  </label>
                                        <input type="text" name="Name_en" value="{{$exam->getTranslation('name','en')}}" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">


                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id"> {{ trans('Teacher_trans.Name_Teacher') }}  : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="teacher_id">
                                                <option value="{{ $exam->teacher_id }}" selected>{{ $exam->teachers->name }}</option>

                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher->id }}" {{$teacher->id == $exam->teacher_id ? "selected":""}}>{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>

                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option value="{{ $exam->grade_id }}" selected>{{ $exam->grades->name }}</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$grade->id == $exam->grade_id ? "selected":""}}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                                <option value="{{ $exam->class_id }}" selected>{{ $exam->classrooms->name }}</option>

                                            </select>

                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id"> {{ trans('subjects.Subject Name') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                <option value="{{ $exam->subject_id }}" selected>{{ $exam->subjects->name }}</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select class="custom-select mr-sm-2" name="section_id">
                                                <option value="{{ $exam->section_id }}" selected>{{ $exam->sections->name }}</option>

                                            </select>
                                        </div>
                                    </div>

                                </div><br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit"> {{ trans('buttons.Save') }}</button>
                            </form>
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
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get_class') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
        <script>
            $(document).ready(function () {
                $('select[name="Classroom_id"]').on('change', function () {
                    var Classroom_id = $(this).val();
                    if (Classroom_id) {
                        $.ajax({
                            url: "{{ URL::to('get_section') }}/" + Classroom_id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="section_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>

                <script>
                    $(document).ready(function () {
                        $('select[name="Classroom_id"]').on('change', function () {
                            var Classroom_id = $(this).val();
                            if (Classroom_id) {
                                $.ajax({
                                    url: "{{ URL::to('get_subject') }}/" + Classroom_id,
                                    type: "GET",
                                    dataType: "json",
                                    success: function (data) {
                                        $('select[name="subject_id"]').empty();
                                        $.each(data, function (key, value) {
                                            $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    },
                                });
                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>

@endsection
