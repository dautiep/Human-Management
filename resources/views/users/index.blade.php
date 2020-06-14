@extends('layouts.layout_admin.admin')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bảng người dùng</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-success" href="{{route('users.create')}}"> Create New User</a>
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
								<th style="width: 100px;">Tên tài khoản</th>
								<th style="width: 150px;">Email</th>
								<th style="width: 150px;">Họ tên</th>
								<th style="width: 50px;">Avatar</th>
								<th style="width: 130px;">Quyền</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$user->username}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->hoten}}</td>
									<td><img width="80px" class="img-circle" src="{{URL::asset('upload/avatar/'.$user->avatar)}}" alt="{{$user->avatar}}" ></td>
									<td>
										@if(!empty($user->getRoleNames()))
											@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
											@endforeach
										@endif 
									</td>
									<td>
										<a class = "btn btn-info" href="{{route('users.show', $user->id)}}">Show</a>
										<a class="btn btn-primary" data-userid={{$user->id}} data-username="{{$user->username}}"
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
								<th>No</th>
								<th>Tên tài khoản</th>
								<th>Email</th>
								<th>Họ tên</th>
								<th>Avatar</th>
								<th>Quyền</th>
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
	<div class="modal modal-danger fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
					<h4 class="modal-title text-center" id="myModalLabel">Sửa thông tin người dùng</h4>
				</div>
				<form enctype="multipart/form-data" action="{{ route('users.update', 'test') }}" method="post">
					{{method_field('patch')}}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="modal-body">
						<div class="form-group">
							<label>Tên tài khoản: </label>
							{!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control', 'id' => 'user_username')) !!}
						</div>
						<div class="form-group">
							<label>Email:</label>
							{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'id' => 'user_email')) !!}
						</div>
						<div class="form-group">
							<label>Mật khẩu:</label>
							{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
						</div>
						<div class="form-group">
							<label>Nhập lại mật khẩu:</label>
							{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
						</div>
						<div class="form-group">
							<label>Họ tên:</label>
							{!! Form::text('hoten', null, array('placeholder' => 'Full Name','class' => 'form-control', 'id' => 'user_hoten')) !!}
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
						<div class="form-group">
							<label>Danh số::</label>
							{!! Form::text('danhso', null, array('placeholder' => 'Danh số','class' => 'form-control', 'id' => 'user_danhso')) !!}
						</div>
						<div class="form-group">
							<label>Số điện thoại:</label>
							{!! Form::text('so_dien_thoai', null, array('placeholder' => 'Số điện thoại','class' => 'form-control', 'id' => 'user_sodienthoai')) !!}
						</div>
						<div class="form-group">
							<label>Avatar:</label>
							<input type="file" class="form-control" name="avatar" id="user_avatar" value="{{old('avatar')}}">
						</div>
						<div class="form-group">
							<strong>Quyền: </strong>
							<select id="roles" class="form-control" multiple name="roles[]">
							@foreach($roles as $role)
								<option value="{{$role}}">{{$role}}</option>
							@endforeach
							</select>  
						</div>
						
						<input type="hidden" name="id_user" id="user_id" value="">
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
				<input type="hidden" name="id_user" id="user_id" value="">

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