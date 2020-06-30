@extends('layouts.layout_admin.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dự án mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Add</li>
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
            <form action="{{route('projects.store')}}" method="post">
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
                                <label for="inputName">Tên dự án</label>
                                <input type="text" name="ten_du_an" class="form-control" value="{{ old('ten_du_an')}}" placeholder="Nhập tên dự án">
                            </div>
                            <div class="form-group">
                                <label>Quy mô trung bình</label>
                                <input type="number" name="quymo_tbinh" class="form-control" placeholder="Nhập số lượng ứng viên" value="{{old('quymo_tbinh')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Mô tả dự án</label>
                                <textarea id="inputDescription" class="form-control" name="mota_duan" rows="10" placeholder="Nhập mô tả dự án"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">User tạo dự án</label>
                                <select class="form-control custom-select" name="id_user">
                                    <option value="" selected disabled>-Chọn tên người tạo dự án-</option>4
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->hoten}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                        <h3 class="card-title">Thời gian của dự án</h3>
        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Thời gian dự kiến</label>
                            <input type="text" id="inputEstimatedBudget" class="form-control" value="2 năm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputSpentBudget">Thời gian bắt đầu</label>
                            <input type="date" id="inputSpentBudget" name="thoigian_batdau" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Thời gian kết thúc</label>
                            <input type="date" id="inputEstimatedDuration" name="thoigian_ketthuc" class="form-control">
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <a href="{{route('projects.index')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection()