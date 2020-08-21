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
						<h1>Danh sách cv</h1>
					</div>
					<div class="col-sm-2">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">DataTables</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		

		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card-body">
					<!-- /.card-header -->
					<div class="card-body">
                        <div class="row">
                            @foreach($jobs as $job)
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <img src="{{URL::asset('public/images/folder_images.jpg')}}" alt="">
                                            <h3 class="card-title" style="font-weight: bold;">{{$job->ma_job}}</h3>
                                            <p class="card-text">Danh sách cv các ứng viên nộp vào job "{{$job->ten_job}}"</p>
                                            <a href="{{route('list-cv', $job->ma_job)}}" class="btn btn-primary">Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
