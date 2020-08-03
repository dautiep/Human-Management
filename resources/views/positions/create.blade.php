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
                    <h1>Chức danh mới</h1>
                </div>
                <div class="col-sm-2">
                    <div class="breadcrumb float-sm-right">
                        <a href="{{route('positions.index')}}" class="btn btn-primary">Trở về</a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="card-body">
                <div class="card-header">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <!-- general form elements -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin chung</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="{{route('positions.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã chức danh:</label>
                                                <input type="text" class="form-control" name="ma_chuc_danh" value="{{ old('ma_chuc_danh')}}" placeholder="Nhập mã chức danh">
                                                @error('ma_chuc_danh')
													<p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
												@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tên chức danh:</label>
                                                <input type="text" class="form-control" name="ten_chuc_danh" value="{{ old('ten_chuc_danh')}}" placeholder="Nhập tên chức danh">
                                                @error('ten_chuc_danh')
													<p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
												@enderror
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
        
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection