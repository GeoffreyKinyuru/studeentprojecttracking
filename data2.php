<?php
session_start();

$conn = new mysqli("localhost", "root", "","projecttracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$seid=$_SESSION['username'];
$stdi = mysqli_query($conn,"SELECT studentID, year FROM registration WHERE email= '$seid' ");
$row=mysqli_fetch_assoc($stdi);
$id=$row['studentID'];
$y=$row['year'];

//check project status
 $user_check_queryyF = "SELECT concept,dfd,proposal,progress,final FROM approvals WHERE studentID='$id' ";
  $resulF = mysqli_query($conn, $user_check_queryyF);
  $conceF = mysqli_fetch_assoc($resulF);
  
  if ($conceF) { // if user exists
    if ($conceF['concept']==="Approved" && $conceF['dfd']==="Approved" && $conceF['proposal']==="Approved" && $conceF['progress']==="Approved" && $conceF['final']==="Approved") {		
      $status = "Approved";
	   
    }else{$status = "Pending";}

  }
//.....//
$Select_Query="SELECT p.projectID,p.projecttitle,p.category,p.status FROM registration r, projects p WHERE  p.studentID = $id AND p.year=$y AND p.studentID=r.studentID";
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
  <title>MMUST Student Project Tracking System</title>
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

</head>
<body class="hold-transition skin-blue sidebar-mini" onLoad="style()">
<div class="wrapper">

  <header class="main-header">
    
	<a href="index.html" class="logo">
      
      <span class="logo-mini"><b>A</b>LT</span>
      
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
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/graduate.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/graduate.png" class="img-circle" alt="User Image">

                
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <a href="../../indexx.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>
         
        </li>
       
      <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Register Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="active"><a href="../../pages/forms/advanced.php"><i class="fa fa-circle-o"></i> Project Registration</a></li>

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
        STUDENT PROJECTS REGISTER
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">students</a></li>
        <li class="active">General Status</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	
	
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PROJECTS THAT YOU HAVE REGISTERED</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Project Id</th>
                  <th>Project Title</th>
                  <th>Category</th>
                  <th>Current Status</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
				
while ($row = mysqli_fetch_array($result))
		{
		
			echo '<tr>
					<td>'.$row['projectID'].'</td>
					<td>'.$row['projecttitle'].'</td>
					<td>'.$row['category'].'</td>
					<td>'. $row['status']=$status. '</td>
					
				</tr>';
			
		}?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Project Id</th>
                  <th>Project Title</th>
                  <th>Category</th>
                  <th>Current Status</th>
                  
                </tr>
                </tfoot>
              </table>
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
    
    <strong>Copyright &copy; 2017-2018 <a href="#">MMUST STUDENT PROJECT TRACKING SYSTEM</a>.</strong> All rights
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
