<!-- jQuery -->
<script src="{{URL::asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{URL::asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('public/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('public/dist/js/demo.js')}}"></script>
<!--crop image-->
<script src="{{URL::asset('public/js/croppie.js')}}"></script>
<!-- Toastr -->
<script src="{{URL::asset('public/lib/toastr/js/toastr.min.js')}}"></script>
<!-- DataPicker -->
<script src="{{URL::asset('public/lib/datapicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<!-- hide errors -->
<script type="text/javascript">
    window.setTimeout(function() {

        $(".alert-err").fadeTo(500, 0).slideUp(500, function(){

            $(this).remove(); 
        });
    }, 10000);
</script>
<!-- Toastr config -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "timeOut": "3000",
    "extendedTimeOut": "3000"
    }

    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("mouseover", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>




