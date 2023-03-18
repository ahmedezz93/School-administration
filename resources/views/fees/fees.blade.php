@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main sidebar.study fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            {{trans('main sidebar.study fees')}}
                </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color"></a></li>
                <li class="breadcrumb-item active">{{trans('main sidebar.study fees')}}
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <!----------------------------رسالة التحقق--------------------------------->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--div-->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!------------------------------زرار ضاافة رسوم---------------------->
                <div class="col-sm-2 col-md-3 mg-t-10 mg-md-t-0">
                    <a href="{{ route('create_fees') }}"
                        class="btn btn-success btn-block">{{ trans('fees.Add new fees') }}</a>
                </div><br><br>
                <!---------------------------------------------------->


                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>{{ trans('fees.Type of fees') }}</th>
                                <th>{{ trans('fees.the cost') }}</th>
                                <th>{{ trans('grades.grade name') }} </th>
                                <th>{{ trans('classrooms.class name') }}</th>
                                <th> {{ trans('Students_trans.academic_year') }} </th>
                                <th> {{ trans('grades.notes') }} </th>
                                <th>{{ trans('grades.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                               @foreach ($fees  as $fee )

                             <tr>
                                <td>{{ $loop->iteration}}</td>
                               <td>{{ $fee->name }}</td>
                               <td>{{ $fee->price }}</td>
                               <td>{{ $fee->grades->name }}</td>
                               <td>{{ $fee->classrooms->name }}</td>
                               <td>{{ $fee->academic_year }}</td>
                               <td>{{ $fee->notes }}</td>
                               <td>
                                      <a href="{{ route('edit_fees',$fee->id) }}" class="btn btn-success" >{{ trans('buttons.edit') }}</a>
                                     <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete_fees{{ $fee->id }}">{{ trans('buttons.delete') }}</a>
                               </td>
                               <td>
                                <div class="modal" id="delete_fees{{ $fee->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title"> {{ trans('fees.delete fees') }}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('delete_fees') }}"
                                                    method="POST">
                                                    @csrf
                                                    <h4> {{ trans('messages.question_message') }}؟</h4>
                                                    <input type="hidden" name="id"
                                                        value="{{ $fee->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn ripple btn-danger"
                                                    type="submit">{{ trans('buttons.delete')  }}</button>
                                                <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                    type="button">{{ trans('buttons.close') }}</button>
                                            </div>
                                            </form>
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
<!-- row closed -->
@endsection
@section('js')

@toastr_js
@toastr_render
@endsection
