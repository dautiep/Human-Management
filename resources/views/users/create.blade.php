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
                        <h1>Tài khoản người dùng</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="breadcrumb float-sm-right">
                            <a href="{{route('users.index')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                    <div class="col-sm-2">
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
            <div class="card-body">
                <div class="card-header">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card card-success">
                                    <div class="card-header">
										<h3 class="card-title">Thông tin chung</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tên tài khoản: </label>
                                                    <input type="text" name="username" class="form-control" value="{{ old('username')}}" placeholder="Nhập tên người dùng">
                                                    @error('username')  
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Địa chỉ Email: </label>
                                                    <input type="text" name="email" class="form-control" value="{{ old('email')}}" placeholder="Nhập email">
                                                    @error('email')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Họ tên: </label>
                                                    <input type="text" name="hoten" class="form-control" value="{{ old('hoten')}}" placeholder="Nhập họ tên">
                                                    @error('hoten')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Số điện thoại: </label>
                                                    <input type="text" name="so_dien_thoai" class="form-control" value="{{ old('so_dien_thoai')}}" placeholder="Nhập số điện thoại">
                                                    @error('so_dien_thoai')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
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
                                                    @error('gioi_tinh')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputPassword1">Mật khẩu: </label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                                    @error('password')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputPassword1">Nhập lại mật khẩu: </label>
                                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Nhập lại mật khẩu" name="confirm-password">
                                                    @error('confirm-password')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Danh số: </label>
                                                    <input type="text" name="danhso" class="form-control" value="{{ old('danhso')}}" placeholder="Nhập danh số">
                                                    @error('danhso')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <strong>Quyền:</strong>
                                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                                    @error('roles')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Thêm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
		</section>
		<!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

