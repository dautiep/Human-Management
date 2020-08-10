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
					<div class="col-sm-6">
						<h1>Bảng tỉnh</h1>
                    </div>
                    <div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#import-provinces">Import file</button>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('provinces.create')}}">Thêm tỉnh</a>
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
						<table id="province-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">No</th>
									<th style="width: 120px;">Mã tỉnh</th>
									<th style="width: 300px;">Tên tỉnh</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($provinces as $province)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$province->ma_tinh}}</td>
										<td>{{$province->ten_tinh}}</td>
										<td>
											<a class="btn btn-warning" data-provinceid={{$province->id}} 
												data-provincema="{{$province->ma_tinh}}"
												data-provinceten="{{$province->ten_tinh}}"
												data-toggle="modal" data-target="#editProvinceModal">Edit
											</a>
											<button class="btn btn-danger" data-provinceid={{$province->id}} 
												data-toggle="modal" data-target="#deleteProvinceModal">Delete
											</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr>
									<th>No</th>
									<th>Mã tinh</th>
									<th>Tên tỉnh</th>
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
	<div class="modal modal-danger fade" id="editProvinceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin tỉnh thành</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('provinces.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Mã tỉnh: </label>
							{!! Form::text('ma_tinh', null, array('placeholder' => 'Mã tỉnh thành','class' => 'form-control', 'id' => 'province_ma_tinh')) !!}
						</div>
						<div class="form-group">
							<label>Tên tỉnh:</label>
							{!! Form::text('ten_tinh', null, array('placeholder' => 'Tên tỉnh thành','class' => 'form-control', 'id' => 'province_ten_tinh')) !!}
						</div>
						<input type="hidden" name="id_province" id="province_id" value="">
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
	<div class="modal modal-danger fade" id="deleteProvinceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('provinces.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa chức danh này không? 
			</p>
				<input type="hidden" name="id_province" id="pro_id" value="">

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
    
    <!-- Start Modal Import -->
    <div class="modal modal-danger fade" id="import-provinces" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                </div>
                <form action="{{ route('import-provinces') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <input type="file" name="file" class="form-control">
                    <div class="modal-footer">
                        <button class="btn btn-success">Import Tỉnh</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Import -->
@endsection
@section('script')
	@parent
	<!-- datatable -->
	<script>
		$("#province-table").DataTable({
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
		$('#editProvinceModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var province_id = button.data('provinceid');
			var province_ma_tinh = button.data('provincema')
			var province_ten_tinh = button.data('provinceten')
			var modal = $(this);
			modal.find('.modal-body #province_id').val(province_id);
			modal.find('.modal-body #province_ma_tinh').val(province_ma_tinh);
			modal.find('.modal-body #province_ten_tinh').val(province_ten_tinh);
			
		});
		$('#deleteProvinceModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var province_id = button.data('provinceid')
			var modal = $(this);
			modal.find('.modal-body #pro_id').val(province_id);
		});
	</script>
	
@endsection