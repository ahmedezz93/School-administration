

@if (auth('student')->check())
@include('layouts.main-sidebar.student-main-sidebar')

@elseif (auth('teacher')->check())
@include('layouts.main-sidebar.teacher-main-sidebar')

@elseif (auth('the_parent')->check())
@include('layouts.main-sidebar.the_parent-main-sidebar')

@elseif (auth('web')->check())
@include('layouts.main-sidebar.admin-main-sidebar')

@endif
