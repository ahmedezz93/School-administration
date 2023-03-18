<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">


                    <li>
                        <a href="{{ route('parent/dashboard') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('dashboard.home') }}</span></a>
                    </li>


                                  <li>
                                    <a href="{{ route('list_childs') }}"><i class="ti-id-badge"></i><span
                                            class="right-nav-text">{{ trans('the_parents.sons') }}</span></a>
                                </li>

                    <li>
                        <a href="{{ route('attendance_childs') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('the_parents.Attendance report') }}</span></a>
                    </li>

                    <li>
                        <a href="{{ route('childs_accounts') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('the_parents.Financial report') }}</span></a>
                    </li>

                    <li>
                        <a href="{{ route('profile_parent') }}"><i class="ti-id-badge"></i><span
                                class="right-nav-text">{{ trans('main sidebar.Profile personly') }}</span></a>
                    </li>




                </ul>

            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
