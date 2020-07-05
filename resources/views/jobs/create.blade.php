@extends('layouts.layout_admin.admin')
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
            <div class="card-header">
                @include('layouts.errors')
            </div>
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
                                <input type="text" name="ma_job" class="form-control" value="{{ old('ma_job')}}" placeholder="Nhập mã công việc" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Tên công việc</label>
                                <input type="text" name="ten_job" class="form-control" value="{{ old('ten_job')}}" placeholder="Nhập tên công việc" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Lý do tuyển</label>
                                <textarea id="inputDescription" class="form-control" name="li_do_tuyen" rows="3" placeholder="Nhập lý do tuyển" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Số lượng tuyển</label>
                                <input type="number" name="so_luong_tuyen" class="form-control" placeholder="Nhập số lượng ứng viên" value="{{old('so_luong_tuyen')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Vị trí</label>
                                <select class="form-control custom-select" name="id_chucdanh" required>
                                    <option value="" selected disabled>-Chọn chức danh-</option>
                                    @foreach($positions as $position)
                                        <option value="{{$position->id}}">{{$position->ten_chuc_danh}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">User tạo công việc</label>
                                <select class="form-control custom-select" name="id_user" required>
                                    <option value="" selected disabled>-Chọn tên người tạo công việc-</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->hoten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Dự án</label>
                                <select class="form-control custom-select" name="id_duan" required>
                                    <option value="" selected disabled>-Chọn dự án-</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->ten_du_an}}</option>
                                    @endforeach
                                </select>
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
                            <input type="text" name="songay_tieuchuan_vitri"  class="form-control" value="{{old('songay_tieuchuan_vitri')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Thời gian offer</label>
                            <input type="date" name="thoigian_offer" value="{{old('thoigian_offer')}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Thời gian đến onboard</label>
                            <input type="date" name="thoigian_den_onboard" value="{{old('thoigian_den_onboard')}}" class="form-control" required>
                        </div>
                        <input type="text" name="trang_thai" class="form-control" value="0" hidden>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <input type="submit" value="Thêm" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()