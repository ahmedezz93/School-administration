@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main sidebar.Students promotion') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('main sidebar.Students promotion') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">{{ trans('grades.old school grade') }}</h6><br>

                    <form method="post" action="{{ route('store_promotion')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('grades.grade name') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required >
                                  @foreach ($grades as $grade )
                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('classrooms.class name') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required >

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{ trans('sections.section name') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"> {{ trans('Students_trans.date of registration') }} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo">{{ trans('grades.new school grade') }}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('grades.grade name') }}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id_new" >
                                    @foreach ($grades as $grade )
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                      @endforeach


                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{ trans('classrooms.class name') }}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id_new" >
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{ trans('sections.section name') }}</label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >
                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"> {{ trans('Students_trans.date of registration') }}: <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('buttons.Save') }}</button>
                    </form>

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
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get_class')}}/" + grade_id,
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
            var class_id = $(this).val();
            if (class_id) {
                $.ajax({
                    url: "{{ URL::to('get_section')}}/" + class_id,
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
        $('select[name="Grade_id_new"]').on('change', function () {
            var grade_id_new = $(this).val();
            if (grade_id_new) {
                $.ajax({
                    url: "{{ URL::to('get_class')}}/" + grade_id_new,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
    $('select[name="Classroom_id_new"]').on('change', function () {
        var Classroom_id_new = $(this).val();
        if (Classroom_id_new) {
            $.ajax({
                url: "{{ URL::to('get_section')}}/" + Classroom_id_new,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id_new"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
