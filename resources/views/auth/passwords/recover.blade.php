
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../public/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Custom css-->
  <link rel="stylesheet" href="../../public/css/custom.css">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Đặt lại mật khẩu</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Để thay đổi mật khẩu, hãy nhập email của bạn và mật khẩu mới vào form bên dưới.</p>

      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-left">Email:</label>
          <div class="col-md-12">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Nhập email của bạn">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-1">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nhập mật khẩu mới">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span id="faopen" class="fas fa-eye" onclick="showHiddenPass()"></span>
                  <span id="faclose" class="fas fa-eye-slash" onclick="showHiddenPass()" style="display: none;"></span>
                </div>
              </div>

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-1">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span id="fapen" class="fas fa-eye" onclick="showHiddenConfirmPass()"></span>
                  <span id="falose" style="display: none;" class="fas fa-eye-slash" onclick="showHiddenConfirmPass()"></span>
                </div>
              </div>
            </div>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">
              Thay đổi mật khẩu
          </button>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">Đăng nhập</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../public/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/AdminLTE-master/dist/js/adminlte.min.js"></script>
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
  function showHiddenConfirmPass()
  {
      var pass = document.getElementById("password-confirm");
      if(pass.type === "password")
      {
          pass.type = "text";
          fapen.style.display = "none";
          falose.style.display = "block";
          
      }else
      {
          pass.type = "password";
          fapen.style.display = "block";
          falose.style.display = "none";
      }
  }
</script>

</body>
</html>
