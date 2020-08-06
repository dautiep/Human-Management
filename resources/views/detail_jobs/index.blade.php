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
						<h1>Bảng chi tiết công việc</h1>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-success" href="{{route('detail-jobs.create')}}"> Tạo Chi tiết công việc</a>
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
					<table id="detail-job-table" class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px;">No</th>
                                <th style="width: 250px;">Tên chi tiết công việc</th>
                                <th style="width: 250px;">Tên công việc</th>
								<th style="width: 300px;">Mô tả công việc</th>
								<th style="width: 300px;">Quyền lợi</th>
								<th style="width: 300px;">Yêu cầu công việc</th>
								<th style="width: 200px;">Thời gian làm việc</th>
								<th style="width: 200px;">Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail_jobs as $detail_job)
									<tr>
										<td>{{++$i}}</td>
                                        <td>{{$detail_job->ten_chitiet}}</td>
                                        <td>{{$detail_job->job->ten_job}}</td>
										<td>
											<ul>
												<?php echo $detail_job->mo_ta_cong_viec ?>
											</ul>
										</td>
										<td>
											<ul>
												<?php echo $detail_job->quyen_loi ?>
											</ul>
										</td>
                                        <td>
											<ul>
												<?php echo $detail_job->yeu_cau_cong_viec ?>
											</ul>
										</td>
                                        <td>
											<ul>
												<?php echo $detail_job->thoi_gian_lam_viec ?>
											</ul>
										</td>
										<td>
											<a class="btn btn-warning" href="{{route('detail-jobs.edit', $detail_job->job->ma_job)}}" >Edit</a>
											<button class="btn btn-danger" data-detailjobma="{{$detail_job->id}}" 
												data-toggle="modal" data-target="#deleteDetailJobModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
						</tbody>
						
						<tfoot>
							<tr>
								<th>No</th>
								<th>Tên chi tiết công việc</th>
								<th>Tên công việc</th>
								<th>Mô tả công việc</th>
								<th>Quyền lợi</th>
                                <th>Yêu cầu công viẹc</th>
                                <th>Thời gian làm việc</th>
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
	<div class="modal modal-danger fade" id="deleteDetailJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('detail-jobs.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
				<p class="text-center">
					Bạn có chắc chắn muốn xóa Chi tiết công việc này không? 
				</p>
				<input type="hidden" name="ma_detailjob" id="detailjob_ma" value="">

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
			$("#detail-job-table").DataTable({
				"scrollX": true,
			});
		});
		
	</script>
	
	<script>
		$('#deleteDetailJobModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var detailjob_ma = button.data('detailjobma')
			var modal = $(this);
			modal.find('.modal-body #detailjob_ma').val(detailjob_ma);
		});
	</script>
	
@endsection