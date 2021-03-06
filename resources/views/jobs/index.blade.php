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
						<h1>Bảng công việc</h1>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-success" href="{{route('jobs.create')}}"> Tạo một Công việc mới</a>
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
					<table id="job-table" class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px;">No</th>
								<th style="width: 100px;">Mã công việc</th>
								<th style="width: 300px;">Tên công việc</th>
								<th style="width: 100px;">Chức danh</th>
								<th style="width: 120px;">Số lượng tuyển</th>
								<th style="width: 260px;">Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($jobs as $job)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$job->ma_job}}</td>
										<td>{{$job->ten_job}}</td>
										<td>{{$job->chucdanh->ten_chuc_danh}}</td>
										<td>{{$job->so_luong_tuyen}}</td>
										<td>
											<a class = "btn btn-primary" href="{{route('jobs.show', $job->ma_job)}}">Show</a>
											<a class="btn btn-warning" href="{{route('jobs.edit', $job->ma_job)}}" >Edit</a>
											<button class="btn btn-danger" data-jobma="{{$job->ma_job}}" 
												data-toggle="modal" data-target="#deleteJobModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
						</tbody>
						
						<tfoot>
							<tr>
								<th>No</th>
								<th>Mã công việc</th>
								<th>Tên công việc</th>
								<th>Chức danh</th>
								<th>Số lượng tuyển</th>
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
	<div class="modal modal-danger fade" id="deleteJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('jobs.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
				<p class="text-center">
					Bạn có chắc chắn muốn xóa công việc này không? 
				</p>
				<input type="hidden" name="ma_job" id="job_ma" value="">

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

	<!-- datatable script -->
	<script>
		$(function () {
			$("#job-table").DataTable({
				"scrollX": true,
			});
		});
		
	</script>
	
	<script>
		$('#deleteJobModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var job_ma = button.data('jobma')
			var modal = $(this);
			modal.find('.modal-body #job_ma').val(job_ma);
		});
	</script>
	
@endsection