<!DOCTYPE html>
<html lang="en">
<!-- ---Head--- -->
<head>
    <base href="{{ asset('') }}"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{URL::asset('public/AdminLTE-master/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    <!-- ---wrapper--- -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('pages.patials.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('pages.patials.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('pages.patials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ---Endwrapper--- -->

    <!-- jQuery -->
    <script src="public/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('public/AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/moment/moment.min.js')}}"></script>
    <script src="{{URL::asset('public/AdminLTE-master/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{URL::asset('public/AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('public/AdminLTE-master/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{URL::asset('public/AdminLTE-master/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::asset('public/AdminLTE-master/dist/js/demo.js')}}"></script>

    <script>
        $(document).ready(function(){
            var url = "{{url('/showUserInRole')}}";
            $('#editModal').on('show.bs.modal', function(event){
                var token = $("input[name='_token'").val()
                var button = $(event.relatedTarget)
                var user_id = button.data('userid');
                var user_username = button.data('username')
                var user_email = button.data('email')
                var user_danhso = button.data('danhso')
                var user_hoten = button.data('hoten')
                var modal = $(this);
                modal.find('.modal-body #user_id').val(user_id);
                modal.find('.modal-body #user_username').val(user_username);
                modal.find('.modal-body #user_email').val(user_email);
                modal.find('.modal-body #user_danhso').val(user_danhso);
                modal.find('.modal-body #user_hoten').val(user_hoten);
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: user_id,
                        _token: token
                    },
                    success: function(data){
                        $.each(data, function(key, value){
                            $("#roles").val(value)
                        });
                    },
                });
            });

            $('#deleteModal').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var user_id = button.data('userid')
                var modal = $(this);
                modal.find('.modal-body #user_id').val(user_id);
            })

            $('#editPermissionModal').on('show.bs.modal', function(event){
                var token = $("input[name='_token'").val()
                var button = $(event.relatedTarget)
                var permission_id = button.data('permissionid');
                var permission_name = button.data('permissionname');
                console.log(permission_name);
                var modal = $(this);
                modal.find('.modal-body #permission_name').val(permission_name);
                modal.find('.modal-body #permission_id').val(permission_id);
            });

            $('#deletePermissionModal').on('show.bs.modal', function(event){
                var button = $(event.relatedTarget)
                var permission_id = button.data('permissionid')
                var modal = $(this);
                modal.find('.modal-body #permission_id').val(permission_id);
            })
        });
    </script>
    @yield('script')
</body>
</html>