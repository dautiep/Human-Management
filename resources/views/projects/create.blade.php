@extends('layouts.layout_admin.admin')
@section('head')
	@parent
	<link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1>Dự án mới</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="breadcrumb float-sm-right">
                            <a href="{{route('projects.index')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card-body">
                <div class="card-header">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <form action="{{route('projects.store')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông tin chung</h3>
                                    
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                        <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputName">Tên dự án</label>
                                                        <input type="text" name="ten_du_an" class="form-control" value="{{ old('ten_du_an')}}" placeholder="Nhập tên dự án">
                                                        @error('ten_du_an')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quy mô trung bình</label>
                                                        <input type="number" name="quymo_tbinh" class="form-control" placeholder="Nhập số lượng ứng viên" value="{{old('quymo_tbinh')}}">
                                                        @error('quymo_tbinh')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDescription">Mô tả dự án</label>
                                                        <textarea id="inputDescription" class="form-control" name="mota_duan" rows="10" placeholder="Nhập mô tả dự án"></textarea>
                                                        @error('mota_duan')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">User tạo dự án</label>
                                                        <select class="form-control custom-select" name="id_user">
                                                            <option value="" selected disabled>-Chọn tên người tạo dự án-</option>4
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->hoten}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_user')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thời gian của dự án</h3>
                                    
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputEstimatedBudget">Thời gian dự kiến</label>
                                                        <input type="text" id="inputEstimatedBudget" class="form-control" value="2 năm" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputSpentBudget">Thời gian bắt đầu</label>
                                                        <input type="text" data-provide="datepicker" id="thoigian_batdau" name="thoigian_batdau" class="form-control">
                                                        @error('thoigian_batdau')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEstimatedDuration">Thời gian kết thúc</label>
                                                        <input type="text" data-provide="datepicker" id="thoigian_ketthuc" name="thoigian_ketthuc" class="form-control">
                                                        @error('thoigian_ketthuc')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Thêm" class="btn btn-primary float-right">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()
@section('script')
    @parent
    <!-- datapicker config -->
    <script type="text/javascript">
        $('#thoigian_batdau').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            // startDate:'+1d', //start date in calendar
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom auto",
            autoclose: true,
            // daysOfWeekDisabled:[0], //except sunday
            
        });

        $('#thoigian_ketthuc').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom auto",
            autoclose: true,
            
        });
    </script>
@endsection()