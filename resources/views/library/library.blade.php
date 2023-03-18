@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('library.List of books')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{trans('library.List of books')}}
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
                                <a href="{{ route('create_library') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('library.Add a new book') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('library.Book name') }}</th>
                                            <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('grades.grade name') }}</th>
                                            <th>{{ trans('classrooms.class name') }}</th>
                                            <th>{{ trans('sections.section name') }}</th>
                                            <th>{{ trans('grades.processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse ($books as $book )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->file_name }}</td>
                                            <td>{{ $book->teachers->name }}</td>
                                            <td>{{ $book->grades->name }}</td>
                                            <td>{{ $book->classrooms->name }}</td>
                                            <td>{{ $book->sections->name }}</td>
                                            <td>
                                                <a class="btn ripple btn-primary"   href="{{ route('edit_library',$book->id) }}">{{ trans('buttons.edit') }}</a>
                                                <a class="btn ripple btn-danger"  data-toggle="modal" data-target="#delete_book{{$book->id}}" href="">{{ trans('buttons.delete') }}</a>

                                            </td>
                                            <td>
                                                <div class="modal fade" id="delete_book{{$book->id}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                   <div class="modal-dialog" role="document">
                                                       <form action="{{route('destroy_library')}}" method="post">
                                                           @csrf
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h5 style="font-family: 'Cairo', sans-serif;"
                                                                       class="modal-title" id="exampleModalLabel">{{ trans('library.delete book') }}</h5>
                                                                   <button type="button" class="close" data-dismiss="modal"
                                                                           aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                               </div>
                                                               <div class="modal-body">
                                                                   <p> {{ trans('messages.question_message') }} <span class="text-danger">{{$book->title}}</span></p>
                                                                   <input type="hidden" name="id" value="{{$book->id}}">
                                                                   <input type="hidden" name="file_name" value="{{$book->file_name}}">
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <div class="modal-footer">
                                                                       <button type="button" class="btn btn-secondary"
                                                                               data-dismiss="modal">{{ trans('buttons.close') }}</button>
                                                                       <button type="submit"
                                                                               class="btn btn-danger">{{ trans('buttons.delete') }}</button>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </form>
                                                   </div>
                                               </div>

                                            </td>

                                        </tr>

                                        @empty

                                        @endforelse

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
