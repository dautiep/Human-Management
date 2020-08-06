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
						<h1>Bảng chức danh</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('education-levels.create')}}">Tạo trình độ văn hóa</a>
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
						<table id="position-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">No</th>
									<th style="width: 300px;">Tên trình độ văn hóa</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($levels as $level)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$level->ten_trinhdovanhoa}}</td>
										<td>
											<a class="btn btn-warning" data-levelid={{$level->id}} 
												data-levelten="{{$level->ten_trinhdovanhoa}}"
												data-toggle="modal" data-target="#editLevelModal">Edit
											</a>
											<button class="btn btn-danger" data-levelid={{$level->id}} 
												data-toggle="modal" data-target="#deleteLevelModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr>
									<th>No</th>
									<th>Tên trình độ văn hóa</th>
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
	<div class="modal modal-danger fade" id="editLevelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin trình độ văn hóa</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('education-levels.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Tên trình độ văn hóa:</label>
							{!! Form::text('ten_trinhdovanhoa', null, array('placeholder' => 'Tên trình độ văn hóa','class' => 'form-control', 'id' => 'level_ten_trinhdovanhoa')) !!}
						</div>
						<input type="hidden" name="id_level" id="level_id" value="">
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
	<div class="modal modal-danger fade" id="deleteLevelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('education-levels.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa trình độ văn hóa này không? 
			</p>
				<input type="hidden" name="id_level" id="lev_id" value="">

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
		$("#position-table").DataTable({
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
		$('#editLevelModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var level_id = button.data('levelid');
			var level_ten_trinhdovanhoa = button.data('levelten')
			var modal = $(this);
			modal.find('.modal-body #level_id').val(level_id);
			modal.find('.modal-body #level_ten_trinhdovanhoa').val(level_ten_trinhdovanhoa);
			
		});
		$('#deleteLevelModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var level_id = button.data('levelid')
			var modal = $(this);
			modal.find('.modal-body #lev_id').val(level_id);
		});
	</script>
	
@endsection