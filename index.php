<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YOEL | Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="asset/dist/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="asset/plugins/iCheck/square/blue.css">

 
  <script src="asset/bootstrap/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="asset/bootstrap/html5shiv/3.7.3/resp ond.min.js"></script>
 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>YOEL</b></a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN</p>

    <form action="inc/proseslogin.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
       
      </div>
    </form>
  </div>
 
</div>

<!-- jQuery 2.1.4 -->
<script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="asset/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
