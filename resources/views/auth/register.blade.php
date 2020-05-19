<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí người dùng</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="public/colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="public/colorlib-regform-7/css/style.css">
</head>
<body>

    <div class="main">
        <!-- ---Sign up form--- -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="{{ route('/home') }}" class="register-form" id="register-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Tên tài khoản"/>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control @error('hoten') is-invalid @enderror" name="hoten" value="{{ old('hoten') }}" required placeholder="Họ và tên"/>

                                @error('hoten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control @error('danhso') is-invalid @enderror" name="danhso" value="{{ old('danhso') }}" required placeholder="Danh số"/>
                                
                                @error('danhso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email của bạn">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" name="avatar">
                            </div>
                            
                            <div class="form-group form-button">
                                <button type="submit" class="btn-register">
                                    <span>{{ __('Đăng kí') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="public/colorlib-regform-7/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signin-image-link">Bạn đã có tài khoản người dùng</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="public/colorlib-regform-7/vendor/jquery/jquery.min.js"></script>
    <script src="public/colorlib-regform-7/js/main.js"></script>
</body>
</html>

    
