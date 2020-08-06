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
						<h1>Bảng nguồn job</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('sources-job.create')}}">Tạo nguồn job</a>
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
						<table id="sourcejob-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">No</th>
									<th style="width: 300px;">Tên nguồn job</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sources as $source)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$source->ten_nguonjob}}</td>
										<td>
											<a class="btn btn-warning" data-sourceid={{$source->id}} 
												data-sourceten="{{$source->ten_nguonjob}}"
												data-toggle="modal" data-target="#editSourceJobModal">Edit
											</a>
											<button class="btn btn-danger" data-sourceid={{$source->id}} 
												data-toggle="modal" data-target="#deleteSourceJobModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr> 
									<th>No</th>
									<th>Tên nguồn job</th>
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
	<div class="modal modal-danger fade" id="editSourceJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin nguồn job</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('sources-job.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Tên nguồn job:</label>
							{!! Form::text('ten_nguonjob', null, array('placeholder' => 'Tên nguồn job','class' => 'form-control', 'id' => 'source_ten_nguonjob')) !!}
						</div>
						<input type="hidden" name="id_source" id="source_id" value="">
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
	<div class="modal modal-danger fade" id="deleteSourceJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('sources-job.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa nguồn job này không? 
			</p>
				<input type="hidden" name="id_source" id="src_id" value="">

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
		$("#sourcejob-table").DataTable({
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
		$('#editSourceJobModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var source_id = button.data('sourceid');
			var source_ten_nguonjob = button.data('sourceten')
			var modal = $(this);
			modal.find('.modal-body #source_id').val(source_id);
			modal.find('.modal-body #source_ten_nguonjob').val(source_ten_nguonjob);
			
		});
		$('#deleteSourceJobModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var source_id = button.data('sourceid')
			var modal = $(this);
			modal.find('.modal-body #src_id').val(source_id);
		});
	</script>
	
@endsection