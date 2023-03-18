@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('sections.List of sections') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   {{ trans('sections.List of sections') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#add_section">
                        {{ trans('sections.Add a new section') }}</a>
                </div>

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

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        @foreach ($grades as $grade)

                        <div class="accordion gray plus-icon round">
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                    <div class="acd-des">
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('sections.section name') }}
                                                                    </th>
                                                                    <th>{{ trans('sections.class name') }}</th>
                                                                    <th>{{ trans('sections.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach ($grade->sections as $section )

                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $section->name }}</td>
                                                                    <td>{{ $section->classrooms->name }}</td>
                                                                    <td>
                                                                        <a class="btn ripple btn-primary" data-target="#edit_section{{$section->id}}" data-toggle="modal" href="">{{ trans('buttons.edit') }}</a>
                                                                        <a class="btn ripple btn-danger" data-target="#delete_section{{$section->id}}" data-toggle="modal" href="">{{ trans('buttons.delete') }}</a>

                                                                    </td>

                                                                    <td>
                                                                    <!--------------------------------تعديل قسم --------------------------------- -->
                                                                    <div class="modal fade"
                                                                         id="edit_section{{$section->id}}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections.edit section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('update_section',$section->id) }}"
                                                                                        method="POST">

                                                                                      @csrf
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_Ar"
                                                                                                       class="form-control"
                                                                                                       value="{{ $section->gettranslation('name','ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_En"
                                                                                                       class="form-control"
                                                                                                       value="{{ $section->gettranslation('name','en')   }}">
                                                                                                <input id="id"
                                                                                                       type="hidden"
                                                                                                       name="id"
                                                                                                       class="form-control"
                                                                                                       value="">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('grades.grade name') }}</label>
                                                                                            <select name="Grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option value="{{ $section->grades->id }}" selected disabled >{{ $section->grades->name }}</option>
                                                                                                        @foreach ($grades as $grade )
                                                                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                                                                        @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('classrooms.class name') }}</label>
                                                                                            <select name="Class_id"
                                                                                                    class="custom-select">
                                                                                                    <option value="{{ $section->classrooms->id }}" selected disabled >{{ $section->classrooms->name }}</option>

                                                                                                <option></option>
                                                                                            </select>

                                                                                            <div class="col">
                                                                                                <label for="inputName" class="control-label">{{ trans('Teacher_trans.Name_Teacher') }}</label>
                                                                                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                    @foreach($section->teachers as $teacher)
                                                                                                        <option value="{{$teacher['id']}}" selected disabled>{{$teacher['name']}}</option>
                                                                                                    @endforeach

                                                                                                    @foreach($teachers as $teacher)
                                                                                                    <option value="{{$teacher->id}}">{{$teacher->name}}<option>
                                                                                                @endforeach

                                                                                                </select>
                                                                                            </div>


                                                                                            <textarea class="form-control" id="notes" name="Notes" rows="3" placeholder="{{ trans('grades.notes') }}">{{ $section->notes }}</textarea>

                                                                                        </div>
                                                                                        <br>



                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('buttons.Save') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                 <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                    id="delete_section{{$section->id}}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                   <div class="modal-dialog" role="document">
                                                                       <div class="modal-content">
                                                                           <div class="modal-header">
                                                                               <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                   class="modal-title"
                                                                                   id="exampleModalLabel">
                                                                                   {{ trans('sections.delete section') }}
                                                                               </h5>
                                                                               <button type="button" class="close"
                                                                                       data-dismiss="modal"
                                                                                       aria-label="Close">
                                                                               <span
                                                                                   aria-hidden="true">&times;</span>
                                                                               </button>
                                                                           </div>
                                                                           <div class="modal-body">
                                                                               <form
                                                                                   action="{{ route('delete_section',$section->id) }}"
                                                                                   method="post">

                                                                                        @csrf

                                                                                   {{ trans('messages.question_message') }}
                                                                                   <input id="id" type="hidden"
                                                                                          name="id"
                                                                                          class="form-control"
                                                                                          value="">
                                                                                   <div class="modal-footer">
                                                                                       <button type="button"
                                                                                               class="btn btn-secondary"
                                                                                               data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                                                       <button type="submit"
                                                                                               class="btn btn-danger">{{ trans('buttons.confirm') }}</button>
                                                                                   </div>
                                                                               </form>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div>


                                                                    </td>
                                                                    </tr>

                                                                    @endforeach
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
                        @endforeach

                    </div>

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="add_section" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('sections.Add a new section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('create_section') }}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="Name_Section_Ar" class="form-control"
                                                       placeholder="{{ trans('sections.Add a section in Arabic') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="Name_Section_En" class="form-control"
                                                       placeholder="{{ trans('sections.Add a section in english') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('grades.grade name') }}</label>
                                            <select name="Grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected
                                                        disabled>{{ trans('sections.select the grade') }}
                                                </option>
                                                @foreach ($grades as $grade )
                                                <option value="{{ $grade->id }}"> {{ $grade->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('sections.class name') }}</label>
                                            <select name="Class_id" class="custom-select">

                                            </select>
                                        </div><br>

                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('Teacher_trans.Name_Teacher') }}</label>
                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('sections.Notes') }}
                                                :</label>
                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>


                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('buttons.Save') }}</button>
                                </div>
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
            $('select[name="Grade_id"]').on('change', function () {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('get_class')}}/" + grade_id,
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

@endsection
