<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>mrbullyfx | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/assets/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>mrbullyfx</b> mrbullyfx</a>
  </div>

	<div class="errorMessage" style="display: none;">

		<div class="alert alert-danger alert-dismissible" role="alert" style="margin:0;">

			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		  <a href="#" class="alert-link" style="text-decoration: none;"></a>

		</div>

	</div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('adminLogin') }}" id="frmLogin" class="form-signin" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="id" name="email" class="form-control txtinput validate[required] text-input" placeholder="Username" required autofocus autocomplete="off" style="cursor: auto; border-radius:0;">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if($errors->has('email'))
         <span class="is-invalid">
          <strong>{{ $errors->first('email') }}</strong>
           </span>
            @endif
        <div class="input-group mb-3">
          <input type="password" id="pswd" name="password" class="form-control txtinput validate[required] text-input" placeholder="Password" required autocomplete="off" style="cursor: auto; border-radius:0;">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          
        </div>
        @if($errors->has('password'))
        <span class="is-invalid">
      <strong>{{ $errors->first('password') }}</strong>
       </span>
        @endif

        @if (session('error'))
        <span style="color: red">
        {{ session('error') }}
        </span>
@endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/assets/js/adminlte.min.js"></script>

</body>
</html>
