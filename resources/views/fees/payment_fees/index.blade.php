@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main sidebar.Student payments')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('main sidebar.Student payments')}}
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ( $payments as $payment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $payment->students->name }}
                                                    </td>
                                                    <td>{{ $payment->credit }}</td>
                                                    <td>{{ $payment->notes }}</td>
                                                    <td>
                                                        <a href="{{ route('edit_payment',$payment->id) }}" class="btn btn-info">{{ trans('buttons.edit') }}</a>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_payment{{ $payment->id }}">{{trans('buttons.delete') }}</a>

                                                    </td>
                                                     <td>
                                                        <div class="modal" id="delete_payment{{ $payment->id }}">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title"> {{ trans('fees.delete fees') }}</h6>
                                                                        <button aria-label="Close" class="close" data-dismiss="modal"
                                                                            type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('delete_payment') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <h4> {{ trans('messages.question_message') }}؟</h4>
                                                                            <input type="hidden" name="id"
                                                                                value="{{$payment->id  }}">
                                                                                <input type="hidden" name="student_id"
                                                                                value="{{$payment->student_id  }}">

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
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
