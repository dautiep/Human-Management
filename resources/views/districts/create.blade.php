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
                    <h1>Huyện mới</h1>
                </div>
                <div class="col-sm-2">
                    <div class="breadcrumb float-sm-right">
                        <a href="{{route('districts.index')}}" class="btn btn-primary">Trở về</a>
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
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin chung</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="{{route('districts.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                    <label for="inputStatus">Thành phố</label>
                                                    <select class="form-control custom-select" name="id_tinh">
                                                        <option value="" selected disabled>-Chọn tỉnh thành-</option>
                                                        @foreach($provinces as $province)
                                                            <option value="{{$province->id}}">{{$province->ten_tinh}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_tinh')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã huyện/quận:</label>
                                                <input type="text" class="form-control" name="ma_huyen" value="{{ old('ma_huyen')}}" placeholder="Nhập mã huyện">
                                                @error('ma_huyen')
													<p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
												@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tên huyện/quận:</label>
                                                <input type="text" class="form-control" name="ten_huyen" value="{{ old('ten_huyen')}}" placeholder="Nhập tên huyện">
                                                @error('ten_huyen')
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