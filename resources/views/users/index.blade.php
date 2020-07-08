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
						<h1>Bảng người dùng</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-success" href="{{route('users.create')}}">Tạo user</a>
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
						<table id="user-table" class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px;">NO</th>
									<th style="width: 150px;">TÊN TÀI KHOẢN</th>
									<th style="width: 150px;">EMAIL</th>
									<th style="width: 150px;">HỌ TÊN</th>
									<th style="width: 100px;">GIỚI TÍNH</th>
									<th style="width: 50px;">AVATAR</th>
									<th style="width: 130px;">VAI TRÒ</th>
									<th style="width: 200px;">THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<td>{{++$i}}</td>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->hoten}}</td>
										<td>{{($user->gioi_tinh == 0)? 'Nam':'Nữ'}}</td>
										<td><img width="80px" class="img-circle" src="{{URL::asset('upload/avatar/'.$user->avatar)}}" alt="{{$user->avatar}}" ></td>
										<td>
											@if(!empty($user->getRoleNames()))
												@foreach($user->getRoleNames() as $v)
												<label class="badge badge-success">{{ $v }}</label>
												@endforeach
											@endif 
										</td>
										<td>
											<a class = "btn btn-primary" href="{{route('users.show', $user->id)}}">Show</a>
											<a class="btn btn-warning" data-userid={{$user->id}} data-username="{{$user->username}}"
												data-email={{$user->email}} data-hoten="{{$user->hoten}}" 
												data-gioi_tinh={{$user->gioi_tinh}}
												data-danhso={{$user->danhso}} data-so_dien_thoai="{{$user->so_dien_thoai}}"
												data-toggle="modal" data-target="#editUserModal">Edit</a>
											<button class="btn btn-danger"  data-userid={{$user->id}} data-toggle="modal" data-target="#deleteUserModal">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
							
							<tfoot>
								<tr>
									<th>NO</th>
									<th>TÊN TÀI KHOẢN</th>
									<th>EMAIL</th>
									<th>HỌ TÊN</th>
									<th>GIỚI TÍNH</th>
									<th>AVATAR</th>
									<th>VAI TRÒ</th>
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
	<div class="modal fade bd-example-modal-lg" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin người dùng</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('users.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Tên tài khoản: </label>
								{!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control', 'id' => 'user_username')) !!}
							</div>
							<div class="form-group col-md-6">
								<label>Email: </label>
								{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'id' => 'user_email')) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Họ tên: </label>
								{!! Form::text('hoten', null, array('placeholder' => 'Full Name','class' => 'form-control', 'id' => 'user_hoten')) !!}
							</div>
							<div class="form-group col-md-6">
								<label>Số điện thoại: </label>
								{!! Form::text('so_dien_thoai', null, array('placeholder' => 'Số điện thoại','class' => 'form-control', 'id' => 'user_sodienthoai')) !!}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Mật khẩu: </label>
								{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
							</div>
							<div class="form-group col-md-6">
								<label>Nhập lại mật khẩu: </label>
								{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
							<label>Giới tính:</label>
							<div class="form-radio-group">            
								<div class="form-radio-item">
									<input type="radio" name="gioi_tinh" id="cash" value="1">
									<label for="cash">Nam</label>
									<span class="check"></span>
								</div>
								<div class="form-radio-item">
									<input type="radio" name="gioi_tinh" id="cheque" value="0">
									<label for="cheque">Nữ</label>
									<span class="check"></span>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Danh số: </label>
								{!! Form::text('danhso', null, array('placeholder' => 'Danh số','class' => 'form-control', 'id' => 'user_danhso')) !!}
							</div>
							<div class="form-group col-md-6">
								<strong>Quyền: </strong>
								<select id="roles" class="form-control" multiple name="roles[]">
									@foreach($roles as $role)
										<option value="{{$role}}">{{$role}}</option>
									@endforeach
								</select>  
							</div>
						</div>
						
						<input type="hidden" name="id_user" id="user_id" value="">
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
	<div class="modal modal-danger fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
			<h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
			</div>
			<form action="{{route('users.destroy', 'test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
			<div class="modal-body">
			<p class="text-center">
				Bạn có chắc chắn muốn xóa tài khoản này không? 
			</p>
				<input type="hidden" name="id_user" id="use_id" value="">

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
			$("#user-table").DataTable({
				"scrollX": true,
			});
		});
		
	</script>

	<!-- user modal -->
	<script>
		var url = "{{url('/showUserInRole')}}";
		//edit user
    	$('#editUserModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var token = $("input[name='_token'").val()
			var user_id = button.data('userid');
			var user_username = button.data('username')
			var user_email = button.data('email')
			var user_hoten = button.data('hoten')
			var user_gioitinh = button.data('gioi_tinh');
			$('input[name="gioi_tinh"][value="'+user_gioitinh+'"]').prop('checked',true); //check gioi tinh
			var user_danhso = button.data('danhso');
			var user_sodienthoai = button.data('so_dien_thoai')
			var modal = $(this);
			modal.find('.modal-body #user_id').val(user_id);
			modal.find('.modal-body #user_username').val(user_username);
			modal.find('.modal-body #user_email').val(user_email);
			modal.find('.modal-body #user_hoten').val(user_hoten);
			modal.find('.modal-body #user_danhso').val(user_danhso);
			modal.find('.modal-body #user_sodienthoai').val(user_sodienthoai);
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					id: user_id,
					_token: token
				},
				success: function(data){
					$.each(data, function(key, value){
						$("#roles").val(value)
					});
				},
			});
		});

		//delete user
		$('#deleteUserModal').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var user_id = button.data('userid')
			var modal = $(this);
			modal.find('.modal-body #use_id').val(user_id);
		});
	</script>
@endsection