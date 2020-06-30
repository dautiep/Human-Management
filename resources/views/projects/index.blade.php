@extends('layouts.layout_admin.admin')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bảng dự án</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-success" href="{{route('projects.create')}}"> Tạo một Dự án mới</a>
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
				<div class="card-body">
					<div class="card-header">
						@include('layouts.errors')
					</div>
					<!-- /.card-header -->
					<div class="card-body">
					<table id="example1" class="table table-bordered table-dark">
						<thead>
							<tr>
								<th style="width: 10px;">No</th>
								<th style="width: 200px;">Tên dự án</th>
								<th style="width: 150px;">Quy mô trung bình</th>
								<th style="width: 150px;">Thời gian bắt đầu</th>
								<th style="width: 150px;">Thời gian kết thúc</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($projects as $project)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$project->ten_du_an}}</td>
									<td>{{$project->quymo_tbinh}}</td>
									<td>{{$project->thoigian_batdau}}</td>
									<td>{{$project->thoigian_ketthuc}}</td>
									
									<td>
										<a class = "btn btn-info" href="{{route('projects.show', $project->slug)}}">Show</a>
										<a class="btn btn-primary" href="{{route('projects.edit', $project->slug)}}">Edit</a>
										<button class="btn btn-danger"  data-projectslug="{{$project->slug}}" data-toggle="modal" data-target="#deleteProjectModal">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
						
						<tfoot>
							<tr>
								<th>No</th>
								<th>Tên dự án</th>
								<th>Quy mô trung bình</th>
								<th>Thời gian bắt đầu</th>
								<th>Thời gian kết thúc</th>
								<th>Thao tác</th>
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

	<!-- Modal Delete -->
	<div class="modal modal-danger fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('projects.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa dự án này không? 
			</p>
				<input type="hidden" name="slug_project" id="project_slug" value="">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
				<button type="submit" class="btn btn-warning">Xóa ngay</button>
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
		$('#deleteProjectModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var project_slug = button.data('projectslug')
			var modal = $(this);
			modal.find('.modal-body #project_slug').val(project_slug);
		});
	</script>
	
@endsection