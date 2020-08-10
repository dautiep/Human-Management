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
                    <h1>Xác nhận thông tin</h1>
                </div>
                <div class="col-sm-2">
                    <div class="breadcrumb float-sm-right">
                        <a href="{{route('candidates.index')}}" class="btn btn-primary">Trở về</a>
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
                                    <div class="card-body">
                                        <form role="form" action="{{route('send-mail', $candidate->id)}}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Họ tên ứng viên:</label>
                                                    <input type="text" class="form-control" name="ho_ten" value="{{$candidate->ho_ten}}" placeholder="Nhập họ tên ứng viên">
                                                    @error('ho_ten')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputEmail1">Email:</label>
                                                    <input type="text" class="form-control" name="email" value="{{$candidate->email}}" placeholder="Nhập email ứng viên">
                                                    @error('email')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputPassword1">Vị trí tuyển dụng:</label>
                                                    <input type="text" class="form-control" name="id_chucdanh" value="{{$candidate->chucdanh->ten_chuc_danh}}" placeholder="Nhập tên chức danh">
                                                    @error('id_chucdanh')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputPassword1">Ngày phỏng vấn:</label>
                                                    <input type="text" class="form-control" data-provide="datepicker" id="thoigian_phongvan" name="thoigian_phongvan" value="" placeholder="Chọn ngày phỏng vấn">
                                                    @error('thoigian_phongvan')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                    
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputPassword1">Giờ phỏng vấn:</label>
                                                    <input type="text" class="form-control"  name="gio_phongvan" value="" placeholder="Nhập giờ phỏng vấn">
                                                    @error('gio_phongvan')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputPassword1">Địa điểm phỏng vấn:</label>
                                                    <input type="text" class="form-control" name="diadiem_phongvan" value="158/2A Hoàng Hoa Thám, Phường 12 , Quận Tân Bình, TP HCM" >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-primary">Xác nhận và gửi mail</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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

@section('script')
    @parent
    <!-- datapicker config -->
    <script type="text/javascript">
        $('#thoigian_phongvan').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom auto",
            autoclose: true,
            daysOfWeekDisabled:[0], //except sunday
            
        });

    </script>
@endsection()