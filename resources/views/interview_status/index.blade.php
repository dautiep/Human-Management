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
						<h1>Bảng trạng thái phỏng vấn</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('interview-status.create')}}">Tạo trạng thái</a>
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
						<table id="status-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">NO</th>
									<th style="width: 300px;">TÊN TRẠNG THÁI</th>
									<th>THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
								@foreach($states as $status)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$status->ten_trangthai_phongvan}}</td>
										<td>
											<a class="btn btn-warning" data-statusid={{$status->id}} 
												data-statusten="{{$status->ten_trangthai_phongvan}}"
												data-toggle="modal" data-target="#editStatusModal">Edit
											</a>
											<button class="btn btn-danger" data-statusid={{$status->id}} 
												data-toggle="modal" data-target="#deleteStatusModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr> 
									<th>No</th>
									<th>TÊN TRẠNG THÁI</th>
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
	<div class="modal modal-danger fade" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin trạng thái</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('interview-status.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Tên trạng thái:</label>
							{!! Form::text('ten_trangthai_phongvan', null, array('placeholder' => 'Tên trạng thái','class' => 'form-control', 'id' => 'status_ten_trangthai_phongvan')) !!}
						</div>
						<input type="hidden" name="id_status" id="status_id" value="">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
					<button type="submit" class="btn btn-primary" data-target="#myModal">Lưu cập nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal Edit-->
	<!-- Modal Delete -->
	<div class="modal modal-danger fade" id="deleteStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('interview-status.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa trạng thái này không? 
			</p>
				<input type="hidden" name="id_status" id="sta_id" value="">

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
		$("#status-table").DataTable({
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

	<!-- position modal -->
	<script>
		$('#editStatusModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var status_id = button.data('statusid');
			var status_ten_trangthai_phongvan = button.data('statusten')
			var modal = $(this);
			modal.find('.modal-body #status_id').val(status_id);
			modal.find('.modal-body #status_ten_trangthai_phongvan').val(status_ten_trangthai_phongvan);
			
		});
		$('#deleteStatusModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var status_id = button.data('statusid')
			var modal = $(this);
			modal.find('.modal-body #sta_id').val(status_id);
		});
	</script>
	
@endsection