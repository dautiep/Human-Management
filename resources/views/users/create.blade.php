@extends('layouts.layout_admin.admin')
@section('head')
    @parent
    
@endsection
@section('content')
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tạo tài khoản người dùng</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-success" href="{{route('users.index')}}"> Back</a>
				</div>
				<div class="col-sm-4">
					<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
					<li class="breadcrumb-item active">Create User</li>
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
					    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên tài khoản: </label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username')}}" placeholder="nhập tên người dùng">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Địa chỉ Email: </label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email')}}" placeholder="nhập email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Họ tên: </label>
                                    <input type="text" name="hoten" class="form-control" value="{{ old('hoten')}}" placeholder="Nhập họ tên">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số điện thoại: </label>
                                    <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai')}}" placeholder="Nhập số điện thoại">
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giới tính: </label>
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
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Mật khẩu: </label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Nhập lại mật khẩu: </label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="confirmPassword" name="confirm-password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Danh số: </label>
                                    <input type="text" name="danhso" class="form-control" value="{{ old('danhso')}}" placeholder="Nhập danh số">
                                </div>
                            </div>
                            <div class="form-row">
                                <strong>Quyền:</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>          
                            </div class="form-row">
                                <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
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


   
          

@endsection

