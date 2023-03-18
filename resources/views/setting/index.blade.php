@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الاعدادات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    الاعدادات
@stop
<!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('update_setting') }}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.School name') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="id" value="{{ $setting->id }}">
                                    <input name="school_name" value="{{ $setting->school_name }}" required type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.current year') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                        <option value="$setting->current_year">{{ $setting->current_year }}</option>
                                        @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.Abbreviated school name') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $setting->Abbreviated_school_name }}" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.the phone') }}</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $setting->phone_number }}" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.School Email') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="{{ $setting->email }}" type="email" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.School address') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="{{ $setting->school_address }}" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.The end of the first term') }} </label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $setting->The_end_of_the_first_term }}" type="text" class="form-control date-pick" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings.End of the second term') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $setting->The_end_of_the_second_term }}" type="text" class="form-control date-pick">
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
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
