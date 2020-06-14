<!-- jQuery -->
<script src="{{URL::asset('public/AdminLTE-master/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('public/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('public/AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('public/AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('public/AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('public/AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('public/AdminLTE-master/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('public/AdminLTE-master/dist/js/demo.js')}}"></script>
<!-- page script -->


<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    
    var url = "{{url('/showUserInRole')}}";
    $('#editUserModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var token = $("input[name='_token'").val()
        var user_id = button.data('userid');
        var user_username = button.data('username')
        var user_email = button.data('email')
        var user_hoten = button.data('hoten')
        var user_gioitinh = button.data('gioi_tinh');
        $('input[name="gioi_tinh"][value="'+user_gioitinh+'"]').prop('checked',true);
        var user_danhso = button.data('danhso');
        var user_sodienthoai = button.data('so_dien_thoai')
        var modal = $(this);
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #user_username').val(user_username);
        modal.find('.modal-body #user_email').val(user_email);
        modal.find('.modal-body #user_hoten').val(user_hoten);
        modal.find('.modal-body #user_danhso').val(user_danhso);
        modal.find('.modal-body #user_sodienthoai').val(user_sodienthoai);
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
    $('#deleteUserModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var user_id = button.data('userid')
        var modal = $(this);
        modal.find('.modal-body #user_id').val(user_id);
    });
    
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
    });

    $('#deleteRoleModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var role_id = button.data('roleid')
        var modal = $(this);
        modal.find('.modal-body #role_id').val(role_id);
    });

    
</script>