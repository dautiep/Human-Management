@extends('layouts.layout_admin.admin')
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
			<div class="row">
				<div class="col-12">
					<div class="card-body">
						<div class="card-header">
							@include('layouts.errors')
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group">
											<strong>Name:</strong>
											{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="form-group">
											<strong>Permission:</strong>
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
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection