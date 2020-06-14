<!DOCTYPE html>
<html>
@yield('head')
@include('layouts.layout_admin.head_admin')
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.layout_admin.nav_admin')

        @include('layouts.layout_admin.slidebar_admin')

        <!-- Content Wrapper. Contains page content -->
        
        @yield('content')
        
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @yield('script')
    @include('layouts.layout_admin.script_admin')
</body>
</html>
