@extends('layouts.layout_admin.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin công việc</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::asset('jobs.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Job Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Job Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <h4>Thông tin chi tiết</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 7:45 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                    </p>
                                </div>

                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                        <span class="username">
                                            <a href="#">Sarah Ross</a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>
                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                                    </p>
                                </div>

                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 5 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                    </p>

                                    <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{$job->ten_job}} <br> <br> {{$job->duan->ten_du_an}}</h3>
                        <div class="text-muted">
                            <h5 class="mt-5 text-muted">Mã công việc:</h6>
                            <p class="text-sm">{{$job->ma_job}}</p>
                            <h5>Lý do tuyển:</h5>
                            <p class="text-sm">{{$job->li_do_tuyen}}</p>
                            <h5>Mô tả job:</h5>
                            <p class="text-sm">{{$job->mo_ta_job}}</p>
                            <h5>Số lượng tuyển:</h5>
                            <p class="text-sm">{{$job->so_luong_tuyen}} người</p>
                            <h5>Vị trí tuyển dụng:</h5>
                            <p class="text-sm">{{$job->chucdanh->ten_chuc_danh}}</p>
                            <h5>Thời gian công việc:</h5>
                            <b class="d-block">Số ngày tiêu chuẩn vị trí:</b>
                            <p class="text-sm">{{$job->songay_tieuchuan_vitri}} ngày</p>
                            <b class="d-block">Ngày offfer:</b>
                            <p class="text-sm">{{date_format(date_create("$job->thoigian_offer"),"d-m-Y")}}</p>
                            <b class="d-block">Ngày onboard:</b>
                            <p class="text-sm">{{date_format(date_create("$job->thoigian_den_onboard"),"d-m-Y")}}</p>
                            
                        </div>

                        <h5 class="mt-5 text-muted">Người tạo công việc</h5>
                        <ul class="list-unstyled">
                            <li class="btn-link text-secondary">Họ tên:{{$job->user->username}}</li>
                            <li class="btn-link text-secondary">Email:  {{$job->user->email}}</li>
                            <li class="btn-link text-secondary">Danh số: {{$job->user->danhso}}</li>
                        </ul>
                        <div class="text-center mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Trở về</a>
                            <a href="#" class="btn btn-sm btn-warning">Cập nhật thông tin công việc</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection