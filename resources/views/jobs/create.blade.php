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
                        <h1>Công việc mới</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="breadcrumb float-sm-right">
                            <a href="{{route('jobs.index')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Job Add</li>
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
                            <div class="card-body">
                                <form action="{{route('jobs.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            <h3 class="card-title">Thông tin chung</h3>
                            
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="inputName">Mã công việc</label>
                                                    <input type="text" name="ma_job" class="form-control" value="{{ old('ma_job')}}" placeholder="Nhập mã công việc">
                                                    @error('ma_job')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Tên công việc</label>
                                                    <input type="text" name="ten_job" class="form-control" value="{{ old('ten_job')}}" placeholder="Nhập tên công việc">
                                                    @error('ten_job')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Lý do tuyển</label>
                                                    <textarea id="inputDescription" class="form-control" name="li_do_tuyen" rows="3" placeholder="Nhập lý do tuyển"></textarea>
                                                    @error('li_do_tuyen')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Số lượng tuyển</label>
                                                    <input type="number" name="so_luong_tuyen" class="form-control" placeholder="Nhập số lượng ứng viên" value="{{old('so_luong_tuyen')}}">
                                                    @error('so_luong_tuyen')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStatus">Vị trí</label>
                                                    <select class="form-control custom-select" name="id_chucdanh">
                                                        <option value="" selected disabled>-Chọn chức danh-</option>
                                                        @foreach($positions as $position)
                                                            <option value="{{$position->id}}">{{$position->ten_chuc_danh}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_chucdanh')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStatus">User tạo công việc</label>
                                                    <select class="form-control custom-select" name="id_user">
                                                        <option value="" selected disabled>-Chọn tên người tạo công việc-</option>
                                                        @foreach($users as $user)
                                                            <option value="{{$user->id}}">{{$user->hoten}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_user')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStatus">Dự án</label>
                                                    <select class="form-control custom-select" name="id_duan">
                                                        <option value="" selected disabled>-Chọn dự án-</option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}">{{$project->ten_du_an}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_duan')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        </div>
                                        <div class="col-md-6">
                                        <div class="card card-warning">
                                            <div class="card-header">
                                            <h3 class="card-title">Thời gian của công việc</h3>
                            
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                            </div>
                                            <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputEstimatedBudget">Số ngày tiêu chuẩn vị trí</label>
                                                <input type="text" name="songay_tieuchuan_vitri"  class="form-control" value="{{old('songay_tieuchuan_vitri')}}">
                                                @error('songay_tieuchuan_vitri')
                                                    <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSpentBudget">Thời gian offer</label>
                                                <input type="text" data-provide="datepicker" id="thoigian_offer" name="thoigian_offer" value="{{old('thoigian_offer')}}" class="form-control">
                                                @error('thoigian_offer')
                                                    <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                @enderror
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEstimatedDuration">Thời gian đến onboard</label>
                                                <input type="text" data-provide="datepicker" id="thoigian_den_onboard" name="thoigian_den_onboard" value="{{old('thoigian_den_onboard')}}" class="form-control">
                                                @error('thoigian_den_onboard')
                                                    <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                @enderror
                                            </div>
                                            <input type="text" name="trang_thai" class="form-control" value="0" hidden>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" value="Thêm" class="btn btn-success">
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
        $('#thoigian_offer').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom auto",
            autoclose: true,
        });

        $('#thoigian_den_onboard').datepicker({
            format:"dd-mm-yyyy",
            minDate:0,
            todayBtn:"linked",
            todayHighlight: true,
            orientation:"bottom auto",
            autoclose: true,
        });
    </script>
@endsection()