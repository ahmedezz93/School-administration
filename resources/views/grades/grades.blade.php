@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{ trans('grades.list_grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif



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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('grades.Add a new grade') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('grades.grade name') }}</th>
                            <th>{{ trans('grades.notes') }}</th>
                            <th>{{ trans('grades.processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    @forelse ($grades as $grade )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->notes }}</td>
                        <td>
                        <a class="btn ripple btn-primary" data-target="#editgrade{{$grade->id}}" data-toggle="modal" href="">{{ trans('buttons.edit') }}</a>
                        <a class="btn ripple btn-danger" data-target="#deletegrade{{$grade->id}}" data-toggle="modal" href="">{{ trans('buttons.delete') }}</a>

                        </td>
                        <td>
                            		<!-- تعديل مرحلة -->
                                    <div class="modal" id="editgrade{{$grade->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title"> {{ trans('grades.edit grade') }}</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update_grade') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                        value="{{ $grade->id}}">

                                                        <label> arabic</label>

                                                        <input type="text" name="Name_ar"
                                                            value="{{ $grade->gettranslation('name','ar') }}">
                                                        <label> english</label>
                                                        <input type="text" name="Name_en"
                                                            value="{{$grade->gettranslation('name','en')   }}">

                                                        <textarea class="form-control" id="notes" name="Notes" rows="3">{{ $grade->notes }}</textarea>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn ripple btn-primary"
                                                        type="submit">{{ trans('buttons.confirm') }}</button>
                                                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                        type="button">{{ trans('buttons.close') }}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal effects-->

                                                                		<!-- حذف مرحلة -->
                                                                        <div class="modal" id="deletegrade{{$grade->id}}">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content modal-content-demo">
                                                                                    <div class="modal-header">
                                                                                        <h6 class="modal-title"> {{ trans('grades.edit grade') }}</h6>
                                                                                        <button aria-label="Close" class="close" data-dismiss="modal"
                                                                                            type="button"><span aria-hidden="true">&times;</span></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="{{ route('delete_grade',$grade->id) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                          <h6>{{ trans('messages.question_message') }}</h6>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button class="btn ripple btn-danger"
                                                                                            type="submit">{{ trans('buttons.confirm') }}</button>
                                                                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                                                            type="button">{{ trans('buttons.close') }}</button>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End Modal effects-->

                        </td>

                    </tr>

                    @empty
                       <tr>
                        <h6> {{ trans('messages.data not found') }}</h6>
                       </tr>

                    @endforelse

                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
<!-- اضافة مرحلة  -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('grades.Add a new grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('store_grade') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('grades.Stage name in Arabic') }}
                                :</label>
                            <input id="Name" type="text" name="Name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades.Stage name in English') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('grades.notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('grades.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('grades.save') }}</button>
            </div>
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
@endsection
