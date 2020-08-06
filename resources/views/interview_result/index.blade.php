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
						<h1>Bảng trạng thái kết quả phỏng vấn</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('interview-result.create')}}">Tạo trạng thái</a>
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
						<table id="result-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">NO</th>
									<th style="width: 300px;">TÊN TRẠNG THÁI</th>
									<th>THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
								@foreach($results as $result)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$result->ten_ketqua_phongvan}}</td>
										<td>
											<a class="btn btn-warning" data-resultid={{$result->id}} 
												data-resultten="{{$result->ten_ketqua_phongvan}}"
												data-toggle="modal" data-target="#editResultModal">Edit
											</a>
											<button class="btn btn-danger" data-resultid={{$result->id}} 
												data-toggle="modal" data-target="#deleteResultModal">Delete
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
	<div class="modal modal-danger fade" id="editResultModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin trạng thái</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('interview-result.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Tên trạng thái:</label>
							{!! Form::text('ten_ketqua_phongvan', null, array('placeholder' => 'Tên kết quả','class' => 'form-control', 'id' => 'result_ten_ketqua_phongvan')) !!}
						</div>
						<input type="hidden" name="id_result" id="result_id" value="">
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
	<div class="modal modal-danger fade" id="deleteResultModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('interview-result.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa trạng thái kết quả này không? 
			</p>
				<input type="hidden" name="id_result" id="res_id" value="">

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
		$("#result-table").DataTable({
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
		$('#editResultModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var result_id = button.data('resultid');
			var result_ten_ketqua_phongvan = button.data('resultten')
			var modal = $(this);
			modal.find('.modal-body #result_id').val(result_id);
			modal.find('.modal-body #result_ten_ketqua_phongvan').val(result_ten_ketqua_phongvan);
			
		});
		$('#deleteResultModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var result_id = button.data('resultid')
			var modal = $(this);
			modal.find('.modal-body #res_id').val(result_id);
		});
	</script>
	
@endsection