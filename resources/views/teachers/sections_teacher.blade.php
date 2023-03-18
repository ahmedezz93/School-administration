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


            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('grades.grade name') }}</th>
                            <th>{{ trans('sections.section name') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sections as $section )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $section->grades->name }}</td>
                            <td>{{ $section->name }}</td>

                        </tr>
                        @empty
                           <tr>
                            <h6> {{ trans('messages.data not found') }}</h6>
                           </tr>

                        @endforelse

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
