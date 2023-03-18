<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <li>
                        <a href="{{ route('teacher/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{trans('dashboard.home')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- الطلاب-->
                    <li>
                        <a href="{{ route('students_data') }}"><i class="fas fa-user-graduate"></i><span
                                class="right-nav-text">{{ trans('main sidebar.students') }}</span></a>
                    </li>
                    <!-- التقارير-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text"> {{ trans('main sidebar.reports') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('attendance') }}">{{ trans('attendance.List of attendance and absence') }}</a> </li>
                            <li> <a href="{{ route('attendance_reports') }}">{{ trans('attendance.Attendance and absence reports') }}</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li>



                                           <!-- menu item exams-->
                                           <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                                                <div class="pull-left"><i class="ti-id-badge"></i><span
                                                        class="right-nav-text">{{ trans('main sidebar.exams') }}</span></div>
                                                <div class="pull-right"><i class="ti-plus"></i></div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="exams" class="collapse" data-parent="#sidebarnav">
                                                <li> <a href="{{ route('exam') }}">{{ trans('exams.list of exams') }}</a> </li>
                                            </ul>
                                        </li>
                                        <!-- menu item Multi exams-->
                                        <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Online classes">
                                                <div class="pull-left"><i class="ti-id-badge"></i><span
                                                        class="right-nav-text"> {{ trans('main sidebar.Online classes') }}</span></div>
                                                <div class="pull-right"><i class="ti-plus"></i></div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="Online classes" class="collapse" data-parent="#sidebarnav">
                                                <li> <a href="{{ route('online_class') }}">{{ trans('onlineclasses.Direct contact with Zoom') }}</a> </li>
                                            </ul>
                                        </li>


                    <!-- الملف الشخصي-->
                    <li>
                        <a href="{{ route('profile') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('main sidebar.Profile personly') }}</span></a>
                    </li>


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
