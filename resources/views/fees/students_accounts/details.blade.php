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
    <div class="row" >
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
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
                        <div class="accordion gray plus-icon round">
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ trans('Students_trans.Amounts due') }}</a>
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
                                                                    <th>{{ trans('fees.Type of fees') }}</th>
                                                                    <th>{{ trans('fees.the amount') }}</th>
                                                                    <th>{{ trans('fees.the description') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ( $students->students_fees as $fee )
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $fee->fees->name }}</td>
                                                                        <td>{{ $fee->debit }}</td>
                                                                        <td>{{ $fee->notes }}</td>
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

                    </div>


                </div>


                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="accordion gray plus-icon round">
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ trans('Students_trans.paid up') }}</a>
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
                                                                    <th>{{ trans('fees.Type of fees') }}</th>
                                                                    <th>{{ trans('fees.the amount') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                               @foreach ( $students->payments as $payment)
                                                               <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $payment->notes }}</td>
                                                                <td>{{ $payment->credit }}</td>
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
