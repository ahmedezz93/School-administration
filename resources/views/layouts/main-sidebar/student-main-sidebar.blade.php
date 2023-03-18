<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                        <div class="pull-left"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('main sidebar.exams') }}</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="exams" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{ route('the_exams') }}">{{ trans('exams.list of exams') }}</a> </li>
                    </ul>
                </li>
                <!-- menu item Multi exams-->


                    <!-- الملف الشخصي-->
                    <li>
                        <a href="{{ route('profile_student') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('main sidebar.Profile personly') }}</span></a>
                    </li>



            </ul>

            </div>
        </div>

