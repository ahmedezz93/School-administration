@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
    @section('title')

    {{ trans('questions.make a test') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    {{ trans('questions.make a test') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

    @livewire('students-questions',['exam_id'=>$exam_id,'student_id'=>$student_id])

@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection

