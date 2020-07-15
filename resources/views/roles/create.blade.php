@extends('layouts.layout_admin.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-8">
						<h1>Role mới</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-primary" href="{{route('roles.index')}}">Trở về</a>
						</div>
					</div>
					<div class="col-sm-2">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Create</li>
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
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Thông tin chung</h3>
									</div>
									
									<!-- /.card-header -->
									<div class="card-body">
										<form action="{{route('roles.store')}}" method="post" >
											@csrf
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12">
													<div class="form-group">
														<strong>Tên role:</strong>
														{!! Form::text('name', null, array('placeholder' => 'Nhập tên role','class' => 'form-control')) !!}
														@error('name')
															<p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
														@enderror
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12">
													<div class="form-group">
														<strong>Quyền:</strong>
														<br/>
														@foreach($permission as $value)
															<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
															{{ $value->name }}</label>
														<br/>
														@endforeach
														@error('permission')
															<p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
														@enderror
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12">
													<button type="submit" class="btn btn-primary">Thêm</button>
												</div>
											</div>
										</form>
									</div>
									<!-- /.card-body -->
								</div>
							</div>
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