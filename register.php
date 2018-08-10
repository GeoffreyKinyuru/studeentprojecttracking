<?php include('validator.php') ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MMUST STUDENT PROJECTS | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

 <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  

  <div class="register-box-body">
    <div class="register-logo">
  
    <img src="mmust.jpg" width="200"height="200">
  </div>

    <form action="register.php" method="post">
	<?php include('errors.php'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="fname"value="<?php echo $firstname; ?>"placeholder="First name" pattern="[a-zA-Z]{1,15}" title="NAME CANNOT CONTAIN NUMBERS AND SHOULD BE LESS THAN 15 CHARACTERS">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="sname"placeholder="Surname" pattern="[a-zA-Z]{1,15}" title="NAME CANNOT CONTAIN NUMBERS AND SHOULD BE LESS THAN 15 CHARACTERS!">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="regno"placeholder="Reg No">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="study"placeholder="year of study">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="mail"placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass-1"placeholder="Password"  pattern=".{8,}" title="Password Must contain atleast 8 letters">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass-2"placeholder="Retype password"   pattern=".{8,}" title="Password Must contain atleast 8 letters">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit"class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <a href="index.php" class="text-center">I already have an account</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
