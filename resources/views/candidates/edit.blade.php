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
                        <h1>Sửa thông tin ứng viên</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="breadcrumb float-sm-right">
                            <a href="{{route('users.index')}}" class="btn btn-primary">Trở về</a>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('candidates.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit candidate</li>
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
                                        <form action="{{route('candidates.update', $candidate->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Mã ứng viên</label>
                                                        <input type="text" name="ma_ungvien" class="form-control" value="{{$candidate->ma_ungvien}}" placeholder="Nhập mã ứng viên" />
                                                        @error('ma_ungvien')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Họ tên ứng viên</label>
                                                        <input type="text" name="ho_ten" class="form-control" value="{{$candidate->ho_ten}}"  placeholder="Nhập họ tên ứng viên"/>
                                                        @error('ho_ten')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Ngày sinh</label>
                                                        <input type="text" data-provide="datepicker" id="ngay_sinh" name="ngay_sinh" class="form-control" value="{{date_format(date_create($candidate->ngay_sinh), "d-m-Y")}}" placeholder="Chọn ngày sinh"/>
                                                        @error('ngay_sinh')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text"  name="email" class="form-control" value="{{$candidate->email}}" placeholder="Nhập email ứng viên"/>
                                                        @error('email')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                    <div class="form-radio">
                                                        <div class="label-flex">
                                                            <label for="payment">Giới tính</label>
                                                        </div>
                                                        <div class="form-radio-group">            
                                                            <div class="form-radio-item">
                                                                <input type="radio" name="gioi_tinh" id="cash" value="1" {{($candidate->gioi_tinh==1)?'checked':''}}>
                                                                <label for="cash">Nam</label>
                                                                <span class="check"></span>
                                                            </div>
                                                            <div class="form-radio-item">
                                                                <input type="radio" name="gioi_tinh" id="cheque" value="0" {{($candidate->gioi_tinh==0)?'checked':''}}>
                                                                <label for="cheque">Nữ</label>
                                                                <span class="check"></span>
                                                            </div>
                                                        </div>
                                                        @error('gioi_tinh')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Địa chỉ hiện tại</label>
                                                        <input type="text" name="sonha" class="form-control" value="{{$candidate->sonha}}" placeholder="Nhập số nhà và tên đường" />
                                                        @error('sonha')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="so_dien_thoai" class="form-control" value="{{$candidate->so_dien_thoai}}" placeholder="Nhập số điện thoại" />
                                                        @error('so_dien_thoai')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Tỉnh/Thành phố</label>
                                                        <select class="form-control custom-select" name="id_tinh">
                                                            <option value="" selected disabled>-Chọn tỉnh-</option>
                                                            @foreach($provinces as $province)
                                                                <option value="{{$province->id}}" {{($province->id == $candidate->id_tinh)?'selected':''}}>{{$province->ten_tinh}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_tinh')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Huyện/Quận</label>
                                                        <select class="form-control custom-select" name="id_huyen">
                                                            <option value="" selected disabled>-Chọn huyện-</option>
                                                            @foreach($districts as $district)
                                                                <option value="{{$district->id}}" {{($district->id == $candidate->id_huyen)?'selected':''}}>{{$district->ten_huyen}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_huyen')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Xã/Phường</label>
                                                        <select class="form-control custom-select" name="id_xa">
                                                            <option value="" selected disabled>-Chọn xã-</option>
                                                            @foreach($communes as $commune)
                                                                <option value="{{$commune->id}}" {{($commune->id == $candidate->id_xa)?'selected':''}}>{{$commune->ten_xa}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_xa')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Nguồn công việc</label>
                                                        <select class="form-control custom-select" name="id_nguonjob">
                                                            <option value="" selected disabled>-Chọn nguồn công việc-</option>
                                                            @foreach($sources as $source)
                                                                <option value="{{$source->id}}" {{($source->id == $candidate->id_nguonjob)?'selected':''}}>{{$source->ten_nguonjob}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_nguonjob')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Trình độ văn hóa</label>
                                                        <select class="form-control custom-select" name="id_trinhdovanhoa">
                                                            <option value="" selected disabled>-Chọn trình độ văn hóa-</option>
                                                            @foreach($levels as $level)
                                                                <option value="{{$level->id}}" {{($level->id == $candidate->id_trinhdovanhoa)?'selected':''}}>{{$level->ten_trinhdovanhoa}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_trinhdovanhoa')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Công việc</label>
                                                        <select class="form-control custom-select" name="id_job">
                                                            <option value="" selected disabled>-Chọn công việc-</option>
                                                            @foreach($jobs as $job)
                                                                <option value="{{$job->id}}" {{($job->id == $candidate->id_job)?'selected':''}}>{{$job->ten_job}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_job')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Chức danh</label>
                                                        <select class="form-control custom-select" name="id_chucdanh">
                                                            <option value="" selected disabled>-Chọn chức danh-</option>
                                                            @foreach($positions as $position)
                                                                <option value="{{$position->id}}" {{($position->id == $candidate->id_chucdanh)?'selected':''}}>{{$position->ten_chuc_danh}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_chucdanh')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Trạng thái phỏng vấn</label>
                                                        <select class="form-control custom-select" name="id_trangthai_phongvan">
                                                            <option value="" selected disabled>-Chọn trạng thái-</option>
                                                            @foreach($states as $status)
                                                                <option value="{{$status->id}}" {{($status->id == $candidate->id_trangthai_phongvan)?'selected':''}}>{{$status->ten_trangthai_phongvan}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_trangthai_phongvan')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="inputStatus">Kết quả phỏng vấn</label>
                                                        <select class="form-control custom-select" name="id_ketqua_phongvan">
                                                            <option value="" selected disabled>-Chọn kết quả-</option>
                                                            @foreach($results as $result)
                                                                <option value="{{$result->id}}" {{($result->id == $candidate->id_ketqua_phongvan)?'selected':''}}>{{$result->ten_ketqua_phongvan}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_ketqua_phongvan')
                                                            <p class="alert-err" style="color: red;"><i><b>{{$message}}</b></i></p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">
                                                        <a href = "{{route('candidates.index')}}" class="btn btn-primary">Trở về</a>
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-check"></i>Cập nhật</button>
                                                    </div>
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
    @section('script')
        @parent
        <script>
            var url = "{{route('show-district')}}";
            $("select[name='id_tinh']").change(function(){
                var id_tinh = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        id_tinh: id_tinh,
                        _token: token
                    },
                    success: function(data) {
                        $("select[name='id_huyen'").html('');
                        $.each(data, function(key, value){
                            $("select[name='id_huyen']").append(
                                "<option value=" + value.id + ">" + value.ten_huyen + "</option>"
                            );
                        });
                    }
                });
            });

            var url1 = "{{route('show-commune')}}";
            $("select[name='id_huyen']").change(function(){
                var id_huyen = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: url1,
                    method: 'POST',
                    data: {
                        id_huyen: id_huyen,
                        _token: token
                    },
                    success: function(data) {
                        $("select[name='id_xa'").html('');
                        $.each(data, function(key, value){
                            $("select[name='id_xa']").append(
                                "<option value=" + value.id + ">" + value.ten_xa + "</option>"
                            );
                        });
                    }
                });
            });
        </script>
    @endsection
@endsection


