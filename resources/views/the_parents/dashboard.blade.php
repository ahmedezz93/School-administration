<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('dashboard.home')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">مرحبا بك : {{auth()->user()->name_Father}}</h4>
                    </div><br><br>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-start">


            @forelse ($sons   as  $son )
            <div class="card" style="width: 16rem;">
                <img class="card-img-top" src="{{ URL::asset('assets/images/my_son.png') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ trans('Students_trans.Student_information') }}</h5>
                </div>
                <ul class="list-group list-group-flush" style="color: rgb(44, 42, 151)">
                    <li class="list-group-item">{{ trans('Students_trans.name') }}:{{ $son->name }}</li>
                  <li class="list-group-item">{{ trans('grades.grade name') }}:{{ $son->grades->name }}</li>
                  <li class="list-group-item">{{ trans('classrooms.class name') }}:{{ $son->classrooms->name }}</li>
                  <li class="list-group-item">{{ trans('sections.section name') }}:{{ $son->sections->name }}</li>
                </ul>
              </div>


            @empty
             {{ trans('messages.data not found') }}
            @endforelse
            </div>






            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
</body>

</html>
