<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký ứng viên</title>
    
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/vendor/nouislider/nouislider.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/css/style.css')}}">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{URL::asset('public/css/home_page/register.style.css')}}">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{URL::asset('public/images/form-img.jpg')}}" alt="">
                    <div class="signup-img-content">
                        <h2>Đăng ký ngay</h2>
                        <a style="text-decoration: none; color: white;" href="{{ route('login') }}" class="signin-image-link">Bạn đã có tài khoản</a>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" action="{{ route('user-register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-row">
                            <h2 style="color: black;">Thông tin ứng viên</h2>
                        </div>
                        <div class="form-row" style="margin-top: 30px;">
                            <div class="form-group">
                                <div class="form-input">
                                    <label class="required">Tên tài khoản:</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nhập tên tài khoản"/>
                                    @error('username')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <label class="required">Họ tên:</label>
                                    <input type="text" class="form-control" name="hoten" value="{{ old('hoten') }}" placeholder="Nhập họ và tên"/>
                                    @error('hoten')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <label for="pass" class="required">Mật khẩu: </label>
                                    <div class="col-md-6">
                                        <input  type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                                        @error('password')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label class="required">Nhập lại mật khẩu: </label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirm-password" placeholder="Nhập lại mật khẩu">
                                        @error('confirm-password')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <label class="required">Email:</label>
                                    <input type="text" class="form-control" name="email_address" value="{{ old('email_address') }}" placeholder="Địa chỉ email"/>
                                    @error('email_address')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                                
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label class="required">Giới tính: </label>
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            <input type="radio" name="gioi_tinh" id="cash" value="1">
                                            <label for="cash">Nam</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="gioi_tinh" id="cheque" value="0">
                                            <label for="cheque">Nữ</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                    @error('gioi_tinh')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <label for="chequeno" class="required">Số điện thoại: </label>
                                    <input type="text" class="form-control" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" placeholder="Nhập số điện thoại"/>
                                    @error('so_dien_thoai')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Đăng ký" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Nhập lại" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{URL::asset('public/colorlib-regform-16/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('public/colorlib-regform-16/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('public/colorlib-regform-16/vendor/wnumb/wNumb.js')}}"></script>
    <script src="{{URL::asset('public/colorlib-regform-16/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('public/colorlib-regform-16/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{URL::asset('public/colorlib-regform-16/js/main.js')}}"></script>
    
</body>
</html>