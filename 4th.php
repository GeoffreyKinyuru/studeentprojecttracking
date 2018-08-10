<?php 
session_start();

$conn = new mysqli("localhost", "root", "","projecttracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$seid=$_SESSION['username'];
$Select_Query="SELECT regno,fname,sname,registration.year,projects.projecttitle FROM registration,projects WHERE registration.studentID= projects.studentID AND registration.year = 4 AND projects.year= 4 ";
$result = mysqli_query($conn, $Select_Query);
if (!$result) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>4th Years @ MMUST Student Project Tracking System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<script src="../../htmlprintjs.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</span>
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
         
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="../../coordinator.php">
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
            <li><a href="3rd.php"><i class="fa fa-circle-o"></i> 3rd Years</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> 4th Years</a></li>
                      
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
           <li><a href="../../pages/forms/supervisorRegister.php"><i class="fa fa-circle-o"></i> Add Supervisor</a></li>
            <li><a href="../../pages/tables/supervisorAllocation.php"><i class="fa fa-circle-o"></i> Supervisor Allocation</a></li>
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
            <li><a href="conceptsApproval.php"><i class="fa fa-circle-o"></i> Concept Approvals</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> DFDs Approval</a></li>
			<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Proposals Approval</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Progress Assessment</a></li>
			<li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Final Assessment</a></li>
            
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
        STUDENTS REGISTER
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">students</a></li>
        <li class="active">4th Years</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">4TH YEAR STUDENTS WHO HAVE REGISTERED THEIR PROJECTS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div id="printableTable">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>REG NO</th>
                  <th>FIRSTNAME</th>
                  <th>SURNAME</th>
				  <th>Year of study</th>
                  <th>PROJECT TITLE</th>                  
                </tr>
                </thead>
                <tbody>
                 <?php
				
			while ($row = mysqli_fetch_array($result))
		{
		
			echo '<tr>
					<td>'.$row['regno'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['sname'].'</td>
					<td>'. $row['year']. '</td>
					<td>'.$row['projecttitle'].'</td>					
				</tr>';
			
		}?>
               
			  
                </tbody>
                <tfoot>
                <tr>
                  <th>REG NO</th>
                  <th>FIRSTNAME</th>
                  <th>SURNAME</th>
				  <th>Year of study</th>
                  <th>PROJECT TITLE</th>
                  
                </tr>
                </tfoot>
              </table>
			  </div>
			  	<button class="btn btn-primary" onClick="printDiv()" >Print</button>
              </div>
			  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017-2018 <a href="../../coordinator.php">MMUST STUDENT PROJECT TRACKING SYSTEM</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
