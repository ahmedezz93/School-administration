@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{ trans('classrooms.classrooms lists') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('classrooms.classrooms lists') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
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
                    <!------------------------------زرار ضاافة صف---------------------->

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('classrooms.Add a new class') }}
            </button>
                        <!-------------------------زرار حذف الصفوف المختاره--------------------------->

                <button type="button" class="button x-small" id="btn_delete_all">
                    {{trans('classrooms.delete_rows') }}
                </button>


            <br><br>
                    <!----------------------------------------------------زرار الفلتر------------------------------------------->

                <form action="{{ route('filter_classes') }}" method="POST">
                    @csrf
                    <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                            onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('classrooms.search') }}</option>
                        @foreach ($grades as $grade )

                          <option value="{{ $grade->id }}"  >{{ $grade->name }}</option>

                        @endforeach
                    </select>
                </form><br>
                             <!--------------------------------------------------------------------------------->



            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th>#</th>
                            <th>{{ trans('classrooms.class name')}}</th>
                            <th>{{ trans('classrooms.grade name') }}</th>
                            <th>{{ trans('classrooms.processes') }}</th>
                        </tr>
                    </thead>

                    <tbody>


                        @forelse ( $classes as $class)
                        <tr>
                            <td><input type="checkbox"  value="{{ $class->id }}" class="box1" ></td>
                            <td>{{ $loop->iteration }}</td>
                           <td>{{ $class->name}}</td>
                           <td>{{  $class->grades->name }}</td>
                           <td>
                            <a class="btn ripple btn-primary" data-target="#editclass{{ $class->id }}" data-toggle="modal" href="">{{ trans('buttons.edit') }}</a>
                            <a class="btn ripple btn-danger" data-target="#deleteclass{{ $class->id }}" data-toggle="modal" href="">{{ trans('buttons.delete') }}</a>

                            </td>
                            <td>
                         <!--------------------------------موديل تعديل الصف--------------------------------------->

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="editclass{{ $class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms.edit class')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('update_classroom') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('classrooms.class name in Arabic')}}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name_class_ar"
                                                                   class="form-control"
                                                                   value="{{ $class->gettranslation('name','ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="#">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('classrooms.class name in English') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $class->gettranslation('name','en')}}"
                                                                   name="Name_class_en" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('classrooms.grade name') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="Grade_id">

                                                                <option value="{{ $class->grades->id }}" selected disabled>{{ $class->grades->name }} </option>
                                                       @foreach ($grades as $grade )
                                                       <option value="{{ $grade->id }}" selected disabled>{{ $grade->name }} </option>

                                                       @endforeach
                                                            </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('buttons.confirm') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                            <!------------------------------موديل حذف الصف------------------------------->

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="deleteclass{{ $class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classrooms.delete class')}}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('delete_class') }}"
                                                      method="post">
                                                    @csrf
                                                    <h6>{{ trans('messages.question_message') }}</h6>
                                                    <input id="id" type="hidden" name="class_id" class="form-control"
                                                           value="{{ $class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
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

                           @empty
                           <h6> {{ trans('messages.data not found') }}</h6>


                        @endforelse

                </table>
            </div>
        </div>
    </div>
</div>

        <!----------------------- Modal اضافة صف جديد------------------------------------ -->

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms.Add a new class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('store_classroom') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classrooms.class name in Arabic') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name_class_ar" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{  trans('classrooms.class name in English') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name_class_en" />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classrooms.grade name') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="Grade_id">
                                                    @foreach ($grades as $grade)
                                                      <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classrooms.processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('classrooms.delete class') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classrooms.Add a new class') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('buttons.confirm') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>



<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms.delete_rows')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_chosen_classes') }}" method="POST">
@csrf
                <div class="modal-body">
                    {{ trans('messages.question_message')}}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('buttons.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('buttons.confirm') }}</button>
                </div>
            </form>
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
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>




@endsection
