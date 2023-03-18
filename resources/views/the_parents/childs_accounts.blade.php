@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main sidebar.Students invoices')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
  <h5>{{trans('main sidebar.Students invoices')}}</h5>
     </div>
        <div class="col-sm-6">
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


                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>{{ trans('Students_trans.Added date') }}</th>
                                <th> {{ trans('Students_trans.name') }}</th>
                                <th>{{ trans('Students_trans.Amounts due') }}</th>
                                <th>{{ trans('Students_trans.paid up') }}</th>
                                <th>{{ trans('fees.Residual') }}</th>
                                <th>{{ trans('grades.processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                         @foreach ( $sons as $account )
                         <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $account->created_at }}</td>
                         <td>{{  $account->name}}</td>
                         <td>{{  $account->student_accounts->sum('Debit') }}</td>
                         <td>{{  $account->student_accounts->sum('Credit') }}</td>
                         <td>{{  $account->student_accounts->sum('Debit')-$account->student_accounts->sum('Credit') }}</td>

                               <td>
                                <a href="{{ route('details_childs_accounts',$account->id) }}" class="btn btn-info">{{ trans('buttons.details') }}</a>
                            </td>
                               <td>
                                <div class="modal" id="delete_accounts">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title"> {{ trans('fees.delete fees') }}</h6>
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('delete_accounts') }}"
                                                    method="POST">
                                                    @csrf
                                                    <h4> {{ trans('messages.question_message') }}؟</h4>
                                                    <input type="hidden" name="id"
                                                        value="{{$account->id}}">

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
