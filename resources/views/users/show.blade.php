@extends('layouts.layout_admin.admin')
@section('content')

    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-8">
					<h1>Thông tin chi tiết người dùng</h1>
				</div>
				<div class="col-sm-2">
					<div class="breadcrumb float-sm-right">
						<a href="{{route('users.index')}}" class="btn btn-primary">Trở về</a>
					</div>
                </div>
				<div class="col-sm-2">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
						<li class="breadcrumb-item active">Detail User</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-12">
			<div class="card">
				<!-- /.card-header -->
				<div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Tên tài khoản: </label>
                                <input type="text" class="form-control" id="inputEmail4" value="{{$user->username}}" readonly>
							</div>
							<div class="form-group col-md-6">
                                <label for="inputPassword4">Email:</label>
                                <input type="text" class="form-control" value="{{$user->email_address}}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
							<div class="form-group col-md-6">
                                <label for="inputAddress">Họ tên: </label>
                                <input type="text" class="form-control" id="inputAddress" value="{{$user->hoten}}" readonly>
							</div>
							<div class="form-group col-md-6">
                                <label for="inputAddress">Giới tính: </label>
								<input type="text" class="form-control" id="inputAddress" value="<?php 
									echo $user->gioi_tinh = ($user->gioi_tinh==1)? 'Nam' : 'Nữ';
								?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Số điện thoại: </label>
                                <input type="text" class="form-control" id="inputAddress" value="{{$user->so_dien_thoai}}" readonly>
							</div>
							<div class="form-group col-md-6">
                                <label for="inputAddress">Danh số: </label>
                                <input type="text" class="form-control" id="inputAddress" value="{{$user->danhso}}" readonly>
                            </div>
						</div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
								<label >Hình nền:</label>
								<br>
								<img  src="{{URL::asset('upload/avatar/'.$user->avatar)}}" width="150px">
                            </div>
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