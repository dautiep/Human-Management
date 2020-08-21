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
                    <h1>Danh sách CV</h1>
                </div>
                <div class="col-sm-2">
                    <div class="breadcrumb float-sm-right">
                        <a href="{{route('cv.index')}}" class="btn btn-primary">Trở về</a>
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
                                        <h3 class="card-title">Danh sách CV</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($cvs as $cv)
                                                <div class="col-md-2" style="margin: 15px;">
                                                    <div class="card border-secondary mb-3" style="width: 12rem;">
                                                        <a href="{{URL::asset('upload/cv/'.$cv->job->ma_job.'/'.$cv->ten_cv)}}" download>
                                                            <img style="height: 160px;" src="{{URL::asset('public/images/file_images.jpg')}}" alt="">
                                                        </a>
                                                        <div class="card-body text-secondary">
                                                            <h5 style="margin-left: -10px;" class="card-title">{{$cv->ten_cv}}</h5>
                                                            <h5 style="margin-left: -10px;" class="card-title">Ngày gửi: {{$cv->created_at}}</h5>
                                                        </div>
                                                        <p class="card-text" style="text-align: center;">
                                                            <a style="color: red;" href="{{route('detail-cv', $cv->id)}}">Xem chi tiết</a>
                                                        </p>
                                                        <div class="card-footer">
                                                            <a href="{{URL::asset('upload/cv/'.$cv->job->ma_job.'/'.$cv->ten_cv)}}" download><i class="fas fa-download"></i>Tải xuống</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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

