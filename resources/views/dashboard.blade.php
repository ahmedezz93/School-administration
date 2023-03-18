<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    @livewireStyles
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> {{ trans('dashboard.home') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.number of students') }}</p>
                                    <h4>{{ $num_students }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower
                                growth
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.number of teachers') }}</p>
                                    <h4>{{ $num_teachers }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.The number of parents') }}</p>
                                    <h4>{{ $num_parents }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.The number of classrooms') }}</p>
                                    <h4>{{ $num_classrooms }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title">{{ trans('dashboard.View system operations') }}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="months-tab" data-toggle="tab"
                                                    href="#months" role="tab" aria-controls="months"
                                                    aria-selected="true"> {{ trans('dashboard.number of students') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="year-tab" data-toggle="tab" href="#year"
                                                    role="tab" aria-controls="year" aria-selected="false">{{ trans('dashboard.number of teachers') }}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                    role="tab" aria-controls="year" aria-selected="false">{{ trans('dashboard.Parents') }}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="months" role="tabpanel"
                                        aria-labelledby="months-tab">
                                        <table class="table">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ trans('Students_trans.name') }}</th>
                                                <th scope="col">{{ trans('Students_trans.email') }}</th>
                                                <th scope="col">{{ trans('Students_trans.gender') }}</th>
                                                <th scope="col">{{ trans('grades.grade name') }}</th>
                                                <th scope="col">{{ trans('classrooms.class name') }}</th>
                                                <th scope="col">{{ trans('sections.section name') }}</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (  $students as $student )
                                                <tr>
                                                    <td>{{  $loop->iteration }}</td>
                                                    <td>{{  $student->name }}</td>
                                                    <td>{{  $student->email }}</td>
                                                    <td>{{  $student->genders->name }}</td>
                                                    <td>{{  $student->grades->name }}</td>
                                                    <td>{{  $student->classrooms->name }}</td>
                                                    <td>{{  $student->sections->name }}</td>
                                                  </tr>

                                                @empty
                                                <tr>
                                                    <td>
                                                        <h4>

                                                        {{ trans('messages.data not found') }}
                                                    </h4>

                                                    </td>


                                                </tr>

                                                @endforelse
                                            </tbody>
                                          </table>

                                    </div>
                                    <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/09.jpg" alt="">
                                            </div>

                                        </div>
                                        <table class="table">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                                <th scope="col">{{ trans('Teacher_trans.Gender') }}</th>
                                                <th scope="col">{{ trans('Teacher_trans.Joining_Date') }}</th>
                                                <th scope="col">{{ trans('Teacher_trans.specialization') }}</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (  $teachers as $teacher )

                                                <tr>
                                                    <td>{{  $loop->iteration }}</td>

                                                    <td>{{  $teacher->name }}</td>
                                                    <td>{{  $teacher->genders->name }}</td>
                                                    <td>{{  $teacher->date }}</td>
                                                    <td>{{  $teacher->specializations->name }}</td>

                                                  </tr>

                                                @empty
                                                <tr>
                                                    <td>
                                                        <h4>

                                                        {{ trans('messages.data not found') }}
                                                    </h4>

                                                    </td>


                                                </tr>

                                                @endforelse
                                            </tbody>
                                          </table>

                                    </div>
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="year-tab">
                                        <div class="row mb-30">
                                            <div class="col-md-2 col-sm-6">
                                                <img class="img-fluid" src="images/blog/09.jpg" alt="">
                                            </div>

                                        </div>
                                        <table class="table">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ trans('the_parents.Fathers name in Arabic') }}</th>
                                                <th scope="col">{{ trans('the_parents.Job name') }}</th>
                                                <th scope="col">{{ trans('the_parents.phone number') }}</th>
                                                <th scope="col">{{ trans('Teacher_trans.Address') }}</th>

                                              </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (  $the_parents as $the_parent )

                                                <tr>
                                                    <td>{{  $loop->iteration }}</td>
                                                    <td>{{  $the_parent->name_Father }}</td>
                                                    <td>{{  $the_parent->job_father }}</td>
                                                    <td>{{  $the_parent->phone_father }}</td>
                                                    <td>{{  $the_parent->address_father }}</td>
                                                  </tr>

                                                @empty
                                                <tr>
                                                    <td>
                                                        <h4>

                                                        {{ trans('messages.data not found') }}
                                                    </h4>

                                                    </td>


                                                </tr>

                                                @endforelse
                                            </tbody>
                                          </table>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calendar-main mb-30">
                @livewire('calendar')
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
    @livewireScripts
    @stack('scripts')
</body>

</html>
