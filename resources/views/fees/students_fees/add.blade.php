@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('fees.Adding new fees for the student') }}/{{ $student->name }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('fees.Adding new fees for the student') }}
@stop
<!-- breadcrumb -->
@endsection
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

                        <form class=" row mb-30" action="{{ route('store_students_fees') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_Fees">
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                                    <div class="box">
                                                    <select class="fancyselect" name="student_id" required>
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="fee_id" onchange="console.log($(this).val())" required>
                                                            @foreach ($fees as $fee )
                                                            <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('fees.the cost') }}</label>
                                                    <div class="box">
                                                        <select class="fancyselect" name="price" required>
                                                            @foreach ($fees as $fee )
                                                            <option value="{{ $fee->price }}">{{ $fee->price }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">{{ trans('fees.the description') }}</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('grades.processes') }}:</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('fees.Delete a row') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('fees.Add new fees') }}"/>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="Grade_id" value="">
                                    <input type="hidden" name="Classroom_id" value="">

                                    <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
                                </div>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')


<script>
    $(document).ready(function () {
        $('select[name="fee_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('get_price') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="price"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="price"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>



    @toastr_js
    @toastr_render
@endsection
