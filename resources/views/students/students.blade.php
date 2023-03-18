@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main sidebar.list of students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main sidebar.list of students')}}
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
                                <a href="{{route('add_student')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('Students_trans.add student')}}</a><br><br><br>
         <!------------------------------بحث عن الطلاب--------------------------------->
         <h5 style="color: rgb(16, 81, 125);font-family: Cairo">{{ trans('Students_trans.Search for students') }}</h5>
                                   <form method="post" action="{{ route('filter_student') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputState">{{ trans('grades.grade name') }}</label>
                                            <select class="custom-select mr-sm-2" name="Grade_id"  required >
                                                <option value="" selected disabled>{{ trans('grades.grade name') }}</option>

                                              @foreach ($grades as $grade )
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="Classroom_id">{{ trans('classrooms.class name') }} : <span
                                                    class="text-danger">*</span></label>

                                            <select class="custom-select mr-sm-2" name="Class_id" required >
                                                <option value="" selected disabled>{{ trans('classrooms.class name') }}</option>

                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label for="section_id">{{ trans('sections.section name') }} : </label>

                                          <select class="custom-select mr-sm-2" name="section_id" onchange="this.form.submit()" value="" required>
                                            <option value="" selected disabled>{{ trans('sections.section name') }}</option>
                                        </select>
                                        </form>
                                        </div><br><br><br><br><br>

                      <!----------------------------------------------------------->

                                            <div class="table">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->genders->name}}</td>
                                            <td>{{$student->grades->name}}</td>
                                            <td>{{$student->classrooms->name}}</td>
                                            <td>{{$student->sections->name}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{ trans('grades.processes') }}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" data-target="#Delete_Student{{$student->id}}" data-toggle="modal" href=""><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('Students_trans.Deleted_Student') }}</a>
                                                            <a class="dropdown-item" href="{{ route('edit_student',$student->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  {{ trans('Students_trans.Modify student data') }}</a>
                                                            <a class="dropdown-item" href="{{ route('create_students_fees',$student->id) }}"><i style="color: #9a1b76" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;  {{ trans('fees.Add new fees') }}</a>
                                                            <a class="dropdown-item" href="{{ route('create_payment',$student->id) }}"><i style="color: #1b12d6" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;  {{ trans('fees.Fee payment') }}</a>
                                                            <a class="dropdown-item" href=""><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!-- Deleted inFormation Student -->
                                                    <div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('delete_student')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$student->id}}">

                                                                        <h5 style="font-family: 'Cairo', sans-serif;">{{trans('Students_trans.Deleted_Student_tilte')}}</h5>
                                                                        <input type="text" readonly value="{{$student->name}}" class="form-control">

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
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="Class_id"]').on('change', function () {
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


    @toastr_js
    @toastr_render
@endsection
