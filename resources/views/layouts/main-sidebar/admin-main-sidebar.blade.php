<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('dashboard.home')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                                <!-- menu title -->
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main sidebar.school grade') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades') }}">{{ trans('main sidebar.list_grades') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main sidebar.classrooms') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('classrooms') }}">{{ trans('classrooms.classrooms lists') }} </a> </li>
                        </ul>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main sidebar.sections') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('sections') }}">{{ trans('sections.List of sections') }}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">
                                {{ trans('main sidebar.parents') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('add_parent') }}">{{ trans('main sidebar.List of parents') }}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Custom pages-->

                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main sidebar.students') }}
                                    </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">

                            <li> <a href="{{ route('students') }}">{{ trans('main sidebar.list of students') }}</a> </li>
                            <li> <a href="{{ route('students_promotion') }}">{{ trans('main sidebar.Students promotion') }}</a> </li>

                        </ul>
                    </li>
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                                {{ trans('main sidebar.teachers') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('teachers') }}">{{ trans('main sidebar.List of teachers') }}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">
                                {{ trans('main sidebar.the accounts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('fees') }}">{{ trans('main sidebar.study fees') }}</a> </li>
                            <li> <a href="{{ route('students_accounts') }}">{{ trans('main sidebar.Students invoices') }}</a> </li>
                            <li> <a href="{{ route('payments') }}">{{ trans('main sidebar.Student payments') }}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text"> {{ trans('main sidebar.Attendance') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('attendance_sections') }}">{{ trans('attendance.List of attendance and absence') }}</a> </li>
                        </ul>
                    </li>
                       <!-- menu item subjects-->
                       <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subjects">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text"> {{ trans('main sidebar.Subjects') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subjects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('subjects') }}">{{ trans('main sidebar.List of academic subjects') }}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Multi level-->

                                           <!-- menu item exams-->
                                           <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                                                <div class="pull-left"><i class="ti-id-badge"></i><span
                                                        class="right-nav-text">{{ trans('main sidebar.exams') }}</span></div>
                                                <div class="pull-right"><i class="ti-plus"></i></div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="exams" class="collapse" data-parent="#sidebarnav">
                                                <li> <a href="{{ route('exams') }}">{{ trans('exams.list of exams') }}</a> </li>
                                            </ul>
                                        </li>
                                        <!-- menu item Multi exams-->


            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
                    <div class="pull-left"><i class="ti-id-badge"></i><span
                            class="right-nav-text"> {{ trans('main sidebar.library') }}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="library" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('library') }}">{{ trans('library.List of books') }}</a> </li>
                </ul>
            </li>
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
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
                    <div class="pull-left"><i class="ti-id-badge"></i><span
                            class="right-nav-text"> {{ trans('main sidebar.settings') }}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="settings" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{ route('settings') }}">{{ trans('settings.System settings') }}</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                    <div class="pull-left"><i class="ti-id-badge"></i><span
                            class="right-nav-text"> {{ trans('main sidebar.users') }}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="users" class="collapse" data-parent="#sidebarnav">
                </ul>
            </li>


                </ul>

            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
