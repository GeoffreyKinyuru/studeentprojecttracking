<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN @ MMUST Student project tracking system | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Section</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="" class="user-image" alt="User">
              <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="img-circle" alt="User ">
                
              </li>
              
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logoutAdmin.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
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
        <li >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>
         
        </li>       
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/3rd.php"><i class="fa fa-circle-o"></i> 3rd Years</a></li>
            <li><a href="pages/tables/4th.php"><i class="fa fa-circle-o"></i> 4th Years</a></li>
           
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Supervisors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/supervisorRegister.php"><i class="fa fa-circle-o"></i> Add Supervisor</a></li>
            <li><a href="pages/tables/supervisorAllocation.php"><i class="fa fa-circle-o"></i> Supervisor Allocation</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Assessment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/conceptsApproval.php"><i class="fa fa-circle-o"></i> Concept Approvals</a></li>
            <li><a href="pages/tables/DFD.php"><i class="fa fa-circle-o"></i> DFDs Approval</a></li>
			<li><a href="pages/tables/proposal.php"><i class="fa fa-circle-o"></i> Proposals Approval</a></li>
            <li><a href="pages/tables/progress.php"><i class="fa fa-circle-o"></i> Progress Assessment</a></li>
			<li><a href="pages/tables/final.php"><i class="fa fa-circle-o"></i> Final Assessment</a></li>
            
          </ul>
        </li>
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"></span>

            <div class="info-box-content">
              <span class="info-box-text">Registered Students</span>
              <span class="info-box-number">
			  <?php
$retrievestudents= " SELECT COUNT(studentID) FROM registration "; 
$results = mysqli_query($conn, $retrievestudents);
  $student = mysqli_fetch_assoc($results);;
  if ($student) {
   if ($student[ 'COUNT(studentID)'] >0) {		
   echo $student[ 'COUNT(studentID)'];
  }else{echo "NONE";}
  }	
?>
			  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"></span>

            <div class="info-box-content">
              <span class="info-box-text">3rd Year Projects</span>
              <span class="info-box-number">
			  <?php
$retrievePs = "SELECT COUNT(studentID) FROM projects WHERE year = 3 "; 
$result = mysqli_query($conn, $retrievePs);
  $ps = mysqli_fetch_assoc($result);
  if ($ps) { 
   if ($ps[ 'COUNT(studentID)'] >0) {		
   echo $ps[ 'COUNT(studentID)'];
  }else{echo "NONE";}
  }	
?>
			
			  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"></span>

            <div class="info-box-content">
              <span class="info-box-text">4th Year Projects</span>
              <span class="info-box-number">
			  
 <?php
$retrieve4s = "SELECT COUNT(studentID) FROM projects WHERE year = 4 "; 
$result4 = mysqli_query($conn, $retrieve4s);
  $ps4 = mysqli_fetch_assoc($result4);
  if ($ps4) { 
   if ($ps4[ 'COUNT(studentID)'] >0) {		
   echo $ps4[ 'COUNT(studentID)'];
  }else{echo "NONE";}
  }	
?>
			  
			  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="#">MMUST STUDENT PROJECT TRACKING SYSTEM</a>.</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
