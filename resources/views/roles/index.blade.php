@extends('layouts.layout_admin.admin')
@section('head')
	@parent
	<link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}">
@endsection
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-8">
						<h1>Bảng Role</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('roles.create')}}">Tạo role</a>
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
							@include('layouts.errors')
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="role-table" class="table table-bordered">
								<thead>
									<tr>
										<th style="width: 10px;">NO</th>
										<th style="width: 180px;">TÊN ROLE</th>
										<th>THAO TÁC</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($roles as $key => $role)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $role->name }}</td>
											<td>
												<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
												<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
												<button class="btn btn-danger"  data-roleid={{$role->id}} data-toggle="modal" data-target="#deleteRoleModal">Delete</button>
											</td>
										</tr>
									@endforeach
	
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>ROLE NAME</th>
										<th>THAO TÁC</th>
									</tr>
								</tfoot>
								
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<!-- Modal Delete -->
	<div class="modal modal-danger fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('roles.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có thực sự muốn xóa role này? 
			</p>
				<input type="hidden" name="id_role" id="role_id" value="">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
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
		$("#role-table").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	</script>
	<!-- role modal -->
	<script>
		$('#deleteRoleModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var role_id = button.data('roleid')
			var modal = $(this);
			modal.find('.modal-body #role_id').val(role_id);
		});
	</script>
@endsection
	

	

	
