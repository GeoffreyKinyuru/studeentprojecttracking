<?php include('registerValidator.php');

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MMUST | REGISTRATION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="style.css">



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h2>MMUST</h2></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         

          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["username"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="img-circle" alt="User Image">

                
              </li>
              
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../../indexx.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>
		  </li>
        
        
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="active"><a href="advanced.php"><i class="fa fa-circle-o"></i> Project Registration</a></li>

          </ul>
        </li>
		
		
		
		
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Track Progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../pages/tables/data2.php"><i class="fa fa-circle-o"></i>General status</a></li>
            <li><a href="../../pages/tables/data3.php"><i class="fa fa-circle-o"></i>Assessment Progress</a></li>
          </ul>
    
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PROJECT REGISTRATION SECTION
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="advanced.html">Forms</a></li>
        <li class="active">Project Registration</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
            <form action="advanced.php"method="post">
            <div class="box-body">		
		<?php include('errors.php'); ?>
			<div class="form-group has-feedback" >
                  <label>Project Title</label>
                  <input type="text" name ="title" class="form-control"  placeholder="Enter ..." >
                </div>
				
				
              <div class="form-group has-feedback">
                <label>Category</label>
                <select name="category" class="form-control select2"  style="width: 100%;">
                  <option selected="selected">Desktop applications (java $ other technologies)</option>
                  <option>Web Based (php)</option>
                  <option>Networking</option>
                  <option>Database</option>
                  <option>Android</option>                  
                </select>
              </div>
			  
			  <div class="form-group has-feedback">
                <label>Yeay of Study</label>
                <select name="year" class="form-control select2"  style="width: 100%;">
                  <option selected="selected">3</option>
                  <option>4</option>                                  
                </select>
              </div>
			  
			  
			  <div class="box-footer">
                
                <button type="submit" name="submit" class="btn btn-info pull-right"> Submit</button>
              </div>
			  
			  </div>
            </form>
          </div>         

        </div>       
        
      </div>
      
	  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017-2018 <a href="#">MMUST STUDENT PROJECT TRACKING SYSTEM</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'YYYY-MM-DD h:mm A' })
    //Date range as a button


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    
  })
</script>
</body>
</html>
