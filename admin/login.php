<?php 
if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
    echo "<div class='alert'>Username dan Password tidak sesuai!</div>";
  }

  if($_GET['pesan']=="succes_login"){
    echo "<div class='alert'> </div>";
  }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin | Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="login/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="login/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="login/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
     
      <br>
      <a href=""><b>Selamat Datang</b></a>
      
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login Untuk Memulai</p>

        <form action="proses_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
            <span class="error invalid-feedback"></span>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <span class="error invalid-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-out-alt"></i> Login</button>
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
  <script src="login/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="login/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="login/dist/js/adminlte.min.js"></script>

</body>

</html>