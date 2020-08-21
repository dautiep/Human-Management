@extends('layouts.layout_admin.admin')
@section('head')
    @parent
    <head>
        <!--Croppie js-->
        <link rel="stylesheet" href="{{URL::asset('public/css/croppie.css')}}">
	    <link rel="stylesheet" href="{{URL::asset('public/css/custom.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thông tin cá nhân</h1>
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
            <div class="card-body">
                <div class="card-header">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
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
                        
                                                
                                                <label class="btn btn-success btn-block" style="cursor: pointer;">
                                                    Cập nhật avatar<input type="file" id="upload_image" style="display: none;">
                                                </label>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="form-group col-md-9">
                                        <div class="card card-primary card-outline"> 
                                            <div class="card-header p-2">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link {{($errors->has('username') > 0 || 
                                                            $errors->has('hoten') > 0 || count($errors) == 0 || 
                                                            $errors->has('email') > 0 || $errors->has('so_dien_thoai') > 0 || 
                                                            $errors->has('danhso') > 0) ? 'active' : ''}}" href="#profile" data-toggle="tab">Chỉnh sửa thông tin người dùng
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{($errors->has('password') > 0 || 
                                                            $errors->has('new_password') > 0 || $errors->has('new_password') > 0 ||
                                                            $errors->has('confirm_password') > 0) ? 'active': ''}}" href="#update_password" data-toggle="tab">Thay đổi password
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="{{($errors->has('username') > 0 || 
                                                            $errors->has('hoten') > 0 || count($errors) == 0 || 
                                                            $errors->has('email_address') > 0 || $errors->has('so_dien_thoai') > 0 || 
                                                            $errors->has('danhso') > 0) ? 'active' : ''}} tab-pane" id="profile">
                                                        <form action="{{route('update-profile')}}" method="POST" class="form-horizontal">
                                                            @csrf
                                                            @include('layouts.errors')
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
                                                                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" value="{{Auth::user()->so_dien_thoai}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName2" class="col-sm-2 col-form-label">Danh số:</label>
                                                                <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="danhso" placeholder="Danh số" value="{{Auth::user()->danhso}}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit" class="btn btn-success">Lưu thông tin</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                    <div class="{{($errors->has('password') > 0 || 
                                                            $errors->has('new_password') > 0 || $errors->has('new_password') > 0 ||
                                                            $errors->has('confirm_password') > 0) ? 'active': ''}} tab-pane" id="update_password">
                                                        <form action="{{route('update-password')}}" method="POST">
                                                            @csrf
                                                            @include('layouts.errors')
                                                            <div class="form-group row">
                                                                <label for="inputExperience" class="col-sm-4 col-form-label">Mật khẩu hiện tại: </label>
                                                                <div class="col-sm-8">
                                                                    <div class="input-group mb-1">
                                                                        <input id="password"  type="password" class="form-control" name="password" autocomplete="password" placeholder="Nhập mật khẩu hiện tại">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span id="faopen" class="fas fa-eye" onclick="showHiddenPass()"></span>
                                                                                <span id="faclose" class="fas fa-eye-slash" onclick="showHiddenPass()" style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputExperience" class="col-sm-4 col-form-label">Mật khẩu mới: </label>
                                                                <div class="col-sm-8">
                                                                    <div class="input-group mb-1">
                                                                        <input id="new_password"  type="password" class="form-control" name="new_password" autocomplete="new-password" placeholder="Nhập mật khẩu mới">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span id="fao" class="fas fa-eye" onclick="showHiddenNewPass()"></span>
                                                                                <span id="fac" class="fas fa-eye-slash" onclick="showHiddenNewPass()" style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputSkills" class="col-sm-4 col-form-label">Nhập lại mật khẩu:</label>
                                                                <div class="col-sm-8">
                                                                    <div class="input-group mb-1">
                                                                        <input id="confirm_new_password"  type="password" class="form-control" name="confirm_password" autocomplete="new-password" placeholder="Nhập lại mật khẩu mới">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <span id="faop" class="fas fa-eye" onclick="showHiddenConfirmNewPass()"></span>
                                                                                <span id="facl" class="fas fa-eye-slash" onclick="showHiddenConfirmNewPass()" style="display: none;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="offset-sm-4 col-sm-8">
                                                                <button type="submit" class="btn btn-success">Cập nhật mật khẩu</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.tab-pane -->
                                                </div>
                                                <!-- /.tab-content -->
                        
                                            </div><!-- /.card-body -->
                                        </div>
                                        <!-- /.nav-tabs-custom -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!--Modal update avatar-->
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px"></div>
                         </div>
                        <div class="col-md-4" style="padding-top:30px;">
                            <br />
                            <br />
                            <br/>
                            <button class="btn btn-success crop_image">Cắt và tải hình nền</button>
                         </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script src="{{URL::asset('public/js/croppie.js')}}"></script>
    <script>
        function showHiddenPass()
        {
            var pass = document.getElementById("password");
            if(pass.type === "password")
            {
                pass.type = "text";
                faopen.style.display = "none";
                faclose.style.display = "block";
                
            }else
            {
                pass.type = "password";
                faopen.style.display = "block";
                faclose.style.display = "none";
            }
        }

        function showHiddenNewPass()
        {
            var pass = document.getElementById("new_password");
            if(pass.type === "password")
            {
                pass.type = "text";
                fao.style.display = "none";
                fac.style.display = "block";
                
            }else
            {
                pass.type = "password";
                fao.style.display = "block";
                fac.style.display = "none";
            }
        }

        function showHiddenConfirmNewPass()
        {
            var pass = document.getElementById("confirm_new_password");
            if(pass.type === "password")
            {
                pass.type = "text";
                faop.style.display = "none";
                facl.style.display = "block";
                
            }else
            {
                pass.type = "password";
                faop.style.display = "block";
                facl.style.display = "none";
            }
        }
    </script>
    <script>  
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                width:200,
                height:200,
                type:'square' //circle
                },
                boundary:{
                width:300,
                height:300
                }
            });

            $('#upload_image').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
                }).then(function(response){
                $.ajax({
                    url:"{{route('croppie')}}",
                    method: "POST",
                    data:{"upload_image":response},
                    dataType:'JSON',
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        location.reload();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
                })
            });
        });  
    </script>
@endsection