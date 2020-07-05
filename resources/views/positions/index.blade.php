@extends('layouts.layout_admin.admin')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bảng chức danh</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-success" href="{{route('positions.create')}}"> Tạo Chức danh mới</a>
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
									<th style="width: 120px;">Mã chức danh</th>
									<th style="width: 300px;">Tên chức danh</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($positions as $position)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$position->ma_chuc_danh}}</td>
										<td>{{$position->ten_chuc_danh}}</td>
										<td>
											<a class="btn btn-primary" data-positionid={{$position->id}} 
												data-positionma="{{$position->ma_chuc_danh}}"
												data-positionten="{{$position->ten_chuc_danh}}"
												data-toggle="modal" data-target="#editPositionModal">Edit
											</a>
											<button class="btn btn-danger" data-positionid={{$position->id}} 
												data-toggle="modal" data-target="#deletePositionModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr>
									<th>No</th>
									<th>Mã chức danh</th>
									<th>Tên chức danh</th>
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


	<!-- Modal Edit -->
	<div class="modal modal-danger fade" id="editPositionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin chuc danh</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('positions.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Mã chức danh: </label>
							{!! Form::text('ma_chuc_danh', null, array('placeholder' => 'Mã chức danh','class' => 'form-control', 'id' => 'position_ma_chuc_danh')) !!}
						</div>
						<div class="form-group">
							<label>Tên chức danh:</label>
							{!! Form::text('ten_chuc_danh', null, array('placeholder' => 'Tên chức danh','class' => 'form-control', 'id' => 'position_ten_chuc_danh')) !!}
						</div>
						<input type="hidden" name="id_position" id="position_id" value="">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
					<button type="submit" class="btn btn-warning" data-target="#myModal">Lưu cập nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Modal Edit-->
	<!-- Modal Delete -->
	<div class="modal modal-danger fade" id="deletePositionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('positions.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa chức danh này không? 
			</p>
				<input type="hidden" name="id_position" id="pos_id" value="">

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
		$('#editPositionModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var position_id = button.data('positionid');
			var position_ma_chuc_danh = button.data('positionma')
			var position_ten_chuc_danh = button.data('positionten')
			var modal = $(this);
			modal.find('.modal-body #position_id').val(position_id);
			modal.find('.modal-body #position_ma_chuc_danh').val(position_ma_chuc_danh);
			modal.find('.modal-body #position_ten_chuc_danh').val(position_ten_chuc_danh);
			
		});
		$('#deletePositionModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var position_id = button.data('positionid')
			var modal = $(this);
			modal.find('.modal-body #pos_id').val(position_id);
		});
	</script>
	
@endsection