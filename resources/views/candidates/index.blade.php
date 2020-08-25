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
						<h1>Bảng ứng viên</h1>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-success" href="{{route('candidates.create')}}"> Thêm ứng viên</a>
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
					<!-- /.card-header -->
					<div class="card-body">
					<table id="candidate-table" class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 10px;">No</th>
								<th style="width: 100px;">Mã ứng viên</th>
								<th style="width: 150px">Ngày ứng tuyển</th>
                                <th style="width: 200px;">Họ tên</th>
                                <th style="width: 70px;">Giới tính</th>
                                <th style="width: 150px;">Ngày sinh</th>
								<th style="width: 200px;">Email</th>
                                <th style="width: 150px;">Số điện thoại</th>
								<th style="width: 350px;">Địa chỉ</th>
								<th style="width: 250px;">Công việc</th>
                                <th style="width: 150px;">Nguồn công việc</th>
                                <th style="width: 100px;">Chức danh</th>
								<th style="width: 150px;">Trình độ văn hóa</th>
                                <th style="width: 150px;">Trạng thái phỏng vấn</th>
                                <th style="width: 150px;">Kết quả phỏng vấn</th>
								<th style="width: 500px;">Thao tác</th>
                                
							</tr>
						</thead>
						<tbody>
							@foreach($candidates as $candidate)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$candidate->ma_ungvien}}</td>
									<td>{{date_format(date_create($candidate->created_at), "d-m-Y H:i")}}</td>
									<td>{{$candidate->ho_ten}}</td>
									<td>{{($candidate->gioi_tinh == 1)? 'Nam':'Nữ'}}</td>
									<td>{{date_format(date_create($candidate->ngay_sinh), "d-m-Y")}}</td>
									<td>{{$candidate->email}}</td>
									<td>{{$candidate->so_dien_thoai}}</td>
									<td>{{$candidate->sonha}}, {{$candidate->xa->ten_xa}}, {{$candidate->huyen->ten_huyen}}, {{$candidate->tinh->ten_tinh}}</td>
									<td>{{$candidate->job->ten_job}}</td>
									<td>{{$candidate->nguonjob->ten_nguonjob}}</td>
									<td>{{$candidate->chucdanh->ten_chuc_danh}}</td>
									<td>{{$candidate->trinhdovanhoa->ten_trinhdovanhoa}}</td>
									<td>
										{{$candidate->trangthaiphongvan->ten_trangthai_phongvan}}
										
									</td>
									<td>
										{{$candidate->ketquaphongvan->ten_ketqua_phongvan}}
										
									</td>
									
									<td>
										<a class="btn btn-warning" href="{{route('candidates.edit', $candidate->id)}}" >Sửa</a>
										<button class="btn btn-danger" data-candidatema="{{$candidate->id}}" 
											data-toggle="modal" data-target="#deleteCandidateModal">Xóa
										</button>
										<a class="btn btn-info" href="{{route('confirm', $candidate->id)}}">Gửi mail phỏng vấn</a>
										<span class="dropdown">
										<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Gửi mail kết quả phỏng vấn
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="{{route('send-mail-result', $candidate->id)}}">Mail trúng tuyển</a>
											<a class="dropdown-item" href="{{route('send-mail-result-fail', $candidate->id)}}">Mail trượt</a>
										</div>
										</span>
									</td>
								</tr>
							@endforeach	
						</tbody>
						
						<tfoot>
							<tr>
								<th>No</th>
								<th>Mã ứng viên</th>
								<th>Ngày ứng tuyển</th>
                                <th>Họ tên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Công việc</th>
								<th>Nguồn công việc</th>
								<th>Chức danh</th>
                                <th>Trình độ văn hóa</th>
                                <th>Trạng thái phỏng vấn</th>
                                <th>Kết quả phỏng vấn</th>
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
	<div class="modal modal-danger fade" id="deleteCandidateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('candidates.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
				<p class="text-center">
					Bạn có chắc chắn muốn xóa thông tin ứng viên này không? 
				</p>
				<input type="hidden" name="ma_candidate" id="candidate_ma" value="">

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
			$("#candidate-table").DataTable({
				"scrollX": true,
			});
		});
		
	</script>
	
	<script>
		$('#deleteCandidateModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var candidate_ma = button.data('candidatema')
			console.log(candidate_ma)
			var modal = $(this);
			modal.find('.modal-body #candidate_ma').val(candidate_ma);
		});
	</script>
	
@endsection