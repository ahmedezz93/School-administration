@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('payments.edit payment student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h6 style="color:rgb(32, 58, 147)">{{ trans('payments.edit payment student') }}/{{$payment->students->name}}</h6>
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

                            <form action="{{ route('update_payment') }}" method="post" autocomplete="off">
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('fees.the amount') }} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="credit" value="{{ $payment->credit }}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{ $payment->student_id }}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{ $payment->id }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('fees.the description') }} : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $payment->notes }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
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
