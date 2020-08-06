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
                        <h1>Sửa chi tiết công việc</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="breadcrumb float-sm-right">
                            <a href="{{route('detail-jobs.index')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('detail-jobs.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Detail job</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card card-success">
                                    <div class="card-header">
										<h3 class="card-title">Thông tin chung</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('detail-jobs.update', $detail_job->job->ma_job)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Tên chi tiết công việc: </label>
                                                    <input type="text" name="ten_chitiet" class="form-control" value="{{$detail_job->ten_chitiet}}" placeholder="Nhập tên chi tiết công việc">
                                                    @error('ten_chitiet')  
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="inputStatus">Công việc:</label>
                                                    <select class="form-control custom-select" name="id_job">
                                                        <option value="" selected disabled>-Chọn công việc-</option>
                                                        @foreach($jobs as $job)
                                                            <option value="{{$job->id}}" {{($detail_job->id_job == $job->id)?'selected':''}}>{{$job->ten_job}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_job')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Mô tả công việc: </label>
                                                    <textarea id="inputDescription" class="form-control" name="mo_ta_cong_viec" rows="10" placeholder="Nhập mô tả công việc">{{$detail_job->mo_ta_cong_viec}}</textarea>
                                                    @error('mo_ta_cong_viec')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Quyền lợi: </label>
                                                    <textarea id="inputDescription" class="form-control" name="quyen_loi" rows="10" placeholder="Nhập quyền lợi">{{$detail_job->quyen_loi}}</textarea>
                                                    @error('quyen_loi')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Yêu cầu công việc: </label>
                                                    <textarea id="inputDescription" class="form-control" name="yeu_cau_cong_viec" rows="10" placeholder="Nhập yêu cầu công việc">{{$detail_job->yeu_cau_cong_viec}}</textarea>
                                                    @error('yeu_cau_cong_viec')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Thời gian làm việc: </label>
                                                    <textarea id="inputDescription" class="form-control" name="thoi_gian_lam_viec" rows="5" placeholder="Nhập thời gian làm việc">{{$detail_job->thoi_gian_lam_viec}}</textarea>
                                                    @error('thoi_gian_lam_viec')
                                                        <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                                </div>
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

