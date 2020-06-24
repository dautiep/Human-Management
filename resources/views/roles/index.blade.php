@extends('layouts.layout_admin.admin')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Bảng Role</h1>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-success" href="{{route('roles.create')}}"> Create New Role</a>
					</div>
					<div class="col-sm-4">
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
					<div class="card-header">
						@include('layouts.errors')
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-dark">
							<thead>
								<tr>
									<th style="width: 10px;">No</th>
									<th style="width: 180px;">Role name</th>
									<th>Thao tác</th>
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
									<th>Role name</th>
									<th>Thao tác</th>
								</tr>
							</tfoot>
							
						</table>
					</div>
					<!-- /.card-body -->
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
				Do you want to delete this role? 
			</p>
				<input type="hidden" name="id_role" id="role_id" value="">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-warning">Delete</button>
			</div>
			</form>
		</div>
		</div>
	</div>
	<!-- End Modal delete-->
@endsection
@section('script')
	@parent
	<script>
		$('#deleteRoleModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var role_id = button.data('roleid')
			var modal = $(this);
			modal.find('.modal-body #role_id').val(role_id);
		});
	</script>
@endsection
	

	

	
