<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <!-- boostrap 4 -->
    <link rel="stylesheet" href="{{URL::asset('public/css/bootstrap.min.css')}}">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/vendor/nouislider/nouislider.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('public/colorlib-regform-16/css/style.css')}}">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{URL::asset('public/images/form-img.jpg')}}" alt="">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <a style="text-decoration: none; color: white;" href="{{ route('login') }}" class="signin-image-link">You have an user account</a>
                    </div>
                </div>
                @if($errors->any())
                    <div class="row collapse">
                        <ul class="alert-box warning radius">
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="signup-form">
                    <form method="POST" action="{{ route('user-register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Tên tài khoản"/>
                                    @error('username')
                                        <p class="alert" style="color: red;"><i><b>{{$message}}</b></i></p>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Full name:</label>
                                    <input type="text" class="form-control @error('hoten') is-invalid @enderror" name="hoten" value="{{ old('hoten') }}" required placeholder="Họ và tên"/>
                                    @error('hoten')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-input">
                                    <label for="pass" class="required">Password: </label>
                                    <div class="col-md-6">
                                        <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                </div>
                                <div class="form-input">
                                    <label for="re-pass" class="required">Confirm password: </label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirm-password" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="last_name" class="required">Email:</label>
                                    <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email của bạn">
                                
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment">Gender: </label>
                                    </div>
                                    <div class="form-radio-group">            
                                        <div class="form-radio-item">
                                            <input type="radio" name="gioi_tinh" id="cash" value="1">
                                            <label for="cash">Male</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="gioi_tinh" id="cheque" value="0">
                                            <label for="cheque">Female</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="chequeno" class="required">Phone number: </label>
                                    <input type="text" class="form-control @error('so_dien_thoai') is-invalid @enderror" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" required placeholder="Số điện thoại"/>
                                    @error('so_dien_thoai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            
                            <input type="submit" value="Register" class="submit" id="submit" name="submit" />
                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
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