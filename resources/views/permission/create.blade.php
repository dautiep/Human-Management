@extends('layouts.layout_admin.admin')
@section('content')
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tạo mới permission</h1>
				</div>
				<div class="col-sm-2">
					<a class="btn btn-success" href="{{route('permissions.index')}}">Back</a>
				</div>
				<div class="col-sm-4">
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
		<div class="row">
			<div class="col-12">
				<div class="card-body">
					<div class="card-header">
						@include('layouts.errors')
					</div>
					<!-- /.card-header -->
					<div class="card-body">
                    <form role="form" action="{{route('permissions.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleName">Tên Permissions:</label>
                            <input type="text" class="form-control" id="name" placeholder="Permissions" name="name" value="{{old('name')}}">
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