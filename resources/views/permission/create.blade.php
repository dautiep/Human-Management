@extends('layouts.layout_admin.admin')
@section('content')
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-8">
						<h1>Permission mới</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-primary" href="{{route('permissions.index')}}">Trở về</a>
						</div>
					</div>
					<div class="col-sm-2">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Home</a></li>
							<li class="breadcrumb-item active">Create Permission</li>
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
								<!-- general form elements -->
								<div class="card card-warning">
									<div class="card-header">
										<h3 class="card-title">Thông tin chung</h3>
									</div>
									<div class="card-body">
										<form role="form" action="{{route('permissions.store')}}" method="post">
											@csrf
											<div class="card-body">
											<div class="form-group">
												<label for="exampleName">Tên Permissions:</label>
												<input type="text" class="form-control" id="name" placeholder="Nhập tên quyền" name="name" value="{{old('name')}}">
												@error('name')
													<p style="color: red;"><i><b>{{$message}}</b></i></p>
												@enderror
											</div>
											<div class="form-group">
												<label for="exampleName">Guard_name:</label>
												<input type="text" class="form-control" id="guard_name" placeholder="guard_name" name="guard_name" value="web" readonly>
											</div>
											<!-- /.card-body -->
					
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Thêm</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
			</div>
		</section>
		<!-- /.content -->
    </div>
	<!-- /.content-wrapper -->
@endsection
