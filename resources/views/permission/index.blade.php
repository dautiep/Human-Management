@extends('layouts.layout_admin.admin')
@section('head')
	@parent
	<link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
                    <div class="col-sm-8">
                        <h1>Bảng Permissions</h1>
                    </div>
                    <div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('permissions.create')}}">Tạo permission</a>
						</div>
					</div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card-body">
					<div class="card-header">
					</div>
					<!-- /.card-header -->
					<div class="card-body">
					<table id="permission-table" class="table table-bordered">
						<thead>
							<tr>
                                <th>No</th>
                                <th>NAME</th>
                                <th>GUARD_NAME</th>
                                <th width="280px">THAO TÁC</th>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $p)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$p->name}}</td>
									<td>{{$p->guard_name}}</td>
									<td>
                                        <button class="btn btn-primary" data-permissionid={{$p->id}} data-permissionname={{$p->name}}
                                            data-toggle="modal" data-target="#editPermissionModal">Edit
                                        </button>
                                        <button class="btn btn-danger"  data-permissionid={{$p->id}} data-toggle="modal" data-target="#deletePermissionModal">Delete</button>
                                    </td>
								</tr>
							@endforeach
						</tbody>
						
						<tfoot>
							<tr>
                                <th>No</th>
                                <th>NAME</th>
                                <th>GUARD_NAME</th>
                                <th>THAO TÁC</th>
							</tr>
						</tfoot>
					</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		</section>
		<!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal Edit -->
    <div class="modal modal-danger fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Sửa permission</h4>
            </div>
            <form action="{{ route('permissions.update', 'test') }}" method="post">
                {{method_field('patch')}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body">
                <div class="form-group">
                    <label>Tên Permission </label>
                    {!! Form::text('name', null, array('placeholder' => 'Permission','class' => 'form-control', 'id' => 'permission_name')) !!}
                </div>
                <input type="hidden" name="id_permission" id="permission_id" value="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary" >Lưu cập nhật</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End Modal Edit-->

    <!-- Modal Delete -->
    <div class="modal modal-danger fade" id="deletePermissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
            <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
            </div>
            <form action="{{route('permissions.destroy', 'test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
            <div class="modal-body">
            <p class="text-center">
                Bạn có chắc chắn muốn xóa quyền này không? 
            </p>
                <input type="hidden" name="id_permission" id="per_id" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-danger">Xóa ngay</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- End Modal delete-->
@endsection
@section('script')
    @parent
    <!-- datatable -->
    <script>
		$("#permission-table").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
    </script>
    <!-- errors -->
    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    </script>
    <!-- permission modal -->
    <script>
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
            modal.find('.modal-body #per_id').val(permission_id);
        });
    </script>
@endsection