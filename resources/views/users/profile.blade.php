@extends('layouts.layout_admin.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{URL::asset('upload/avatar/'.Auth::user()->avatar)}}"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>
                    @foreach(Auth::user()->getRoleNames() as $v)
                        <p class="text-muted text-center">{{$v}}</p>
                    @endforeach

                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email: </b> <a class="float-right">{{Auth::user()->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Số điện thoại: </b> <a class="float-right">{{Auth::user()->so_dien_thoai}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Danh số: </b> <a class="float-right">{{Auth::user()->danhso}}</a>
                    </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Cập nhật avatar</b></a>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings">Chỉnh sửa thông tin người dùng</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-pane" id="settings">
                        <form action="{{route('update-profile')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{Auth::user()->username}}">
                                </div>
                                <label for="inputName" class="col-sm-2 col-form-label">Họ tên:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hoten" placeholder="Họ tên" value="{{Auth::user()->hoten}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Giới tính:</label>
                                <div class="col-sm-2">
                                    <input type="radio" name="gioi_tinh" id="cash" value="1" {{(Auth::user()->gioi_tinh==1)?'checked':''}}>
                                    <label>Nam</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="gioi_tinh" id="cheque" value="0" {{(Auth::user()->gioi_tinh==0)?'checked':''}}>
                                    <label>Nữ</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                                </div>
                                <label for="inputEmail" class="col-sm-2 col-form-label">Số điện thoại:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="Số ddienj thoại" value="{{Auth::user()->so_dien_thoai}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Danh số:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="danhso" placeholder="Danh số" value="{{Auth::user()->danhso}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Password: </label>
                                <div class="col-sm-10">
                                    <input  type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Nhập lại Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="confirm-password" autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection