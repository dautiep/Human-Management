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
						<h1>Cập nhật thông tin role</h1>
					</div>
					<div class="col-sm-2">
						<div class="breadcrumb float-sm-right">
							<a class="btn btn-primary" href="{{route('roles.index')}}">Trở về</a>
						</div>
					</div>
					<div class="col-sm-2">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Update</li>
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
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Thông tin chung</h3>
								</div>
								<div class="card-body">
									{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<strong>Tên role:</strong>
													{!! Form::text('name', null, array('placeholder' => 'Nhập tên role','class' => 'form-control')) !!}
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<strong>Quyền:</strong>
													<br/>
													@foreach($permission as $value)
														<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
														{{ $value->name }}</label>
													<br/>
													@endforeach
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12">
												<button type="submit" class="btn btn-primary">Cập nhật</button>
											</div>
										</div>
									{!! Form::close() !!}
								</div>
								<!-- /.card-body -->
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
@section('script')
	@parent
	<!-- errors -->
    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endsection