@extends('layouts.layout_admin.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Thông tin chi tiết role</h1>
					</div>
					<div class="col-sm-2">
						<a class="btn btn-success" href="{{route('roles.index')}}"> Back</a>
					</div>
					<div class="col-sm-4">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item active">Database</li>
                            <li class="breadcrumb-item active">Show</li>
							<li class="breadcrumb-item ">{{$role->id}}</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card-header">
						@include('layouts.errors')
					</div>
					<!-- /.card-header -->
					<div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            	<strong>Tên role:</strong>
                                <i>{{ $role->name }}</i>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Quyền:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <br>
                                    <i>{{ $v->name }}</i>
                                @endforeach
                            @endif
                        </div>
                    </div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection