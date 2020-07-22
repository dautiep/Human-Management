<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    
    <!-- Font Icon -->
    <link rel="stylesheet" href="public/lib/fonts_login/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="public/css/login/css/style.css">

</head>
<body>

    <div class="main">
        <!-- ---Sign up form--- -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="public/images/signin-image.jpg" alt="sing in image"></figure>
                        <a href="{{ route('candidate-register') }}" class="signin-image-link">Bạn chưa có tài khoản người dùng</a>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Tên tài khoản "/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu" data-toggle="password">
                                </div>                                                                                              
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                           
                            <div class="form-group form-button">
                                <button type="submit" class="btn-register">
                                    <span>{{ __('Đăng nhập') }}</span>
                                </button>
                            </div>
                        </form>
                        <div class="social-login">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request', 'csrf') }}">
                                        <span class="social-label">Quên mật khẩu</span>
                                    </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="public/lib/jquery/jquery.min.js"></script>
    <script src="public/js/login/main.js"></script>
</body>
</html>



