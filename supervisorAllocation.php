<?php 
session_start();
include ('Sallocate.php');

mysql_connect("localhost", "root", "") or die ("could not connect to server");
mysql_select_db("projecttracker") or die ("could not select db");

$conn = new mysqli("localhost", "root", "","projecttracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$seid=$_SESSION['username'];
$Select_Query="SELECT r.regno,r.fname,r.sname,r.supervisorName,p.projecttitle FROM registration r, projects p WHERE r.studentID=p.studentID  AND r.year=p.year "  ;

$result = mysqli_query($conn, $Select_Query);

if (!$result) {
	
	die ('SQL Error: ' . mysqli_error($conn));

}

//$supername = "SELECT CONCAT(s2.firstname,' ', s2.lname)AS Name FROM registration r2, supervisors s2, student_supervisor ss WHERE r2.supervisorID= s2.supervisorID" ;

?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student and Supervisors @ MMUST Student Project Tracking System</title>
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
  <link rel="stylesheet" href="../../slocation.css">
  <script src="../../htmlprintjs.js"></script>
  <link rel="stylesheet" href="../../htmlprintcss.css"/>
<link rel="stylesheet" href="../../style.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../coordinator.php" class="logo">
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
              <img src="" class="user-image" alt="User">
              <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="img-circle" alt="User">

                
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
            <li><a href="4th.php"><i class="fa fa-circle-o"></i> 4th Years</a></li>
            
            
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
            <li><a href="#"><i class="fa fa-circle-o"></i> Supervisor Allocation</a></li>
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
        SUPERVISOR ALLOCATION SECTION
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">supervisor</a></li>
        <li class="active">supervisor allocation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<!--allocation area-->
	<div class="row">
        <div class="col-md-6">

          <div class="box box-danger">
		  <div class="box-body">
			  <form action="#"method="POST">
			   	
			  <?php include ('../../errors.php');?>
			  <?php
if(isset($_SESSION['allocatesuccess'])){
	echo "<div class='alert alert-success alert-dismissible'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong></div>";
}else{}			
			?>
	
 <div class="form-group">
  <label style="color:green"for="sel1">STUDENT NAME:</label>
  <select name="student" class="form-ontrol" id="sel1">
  <option selected="selected"></option>
  <?php 
	$result2=mysql_query("SELECT studentID,CONCAT(fname,' ' ,sname) as names FROM registration");
	while($row2=mysql_fetch_array($result2)){
		echo '<option value="'.$row2['studentID'].'">'.$row2['names'].'</option>';
	}
	
	 ?>  
  </select>
</div> 
			  
			   <div class="form-group">
  <label style="color:green"for="sel1">SUPERVISOR NAME:</label>
  <select name="supervisor" class="form-ontrol" id="sel1">
  <option selected="selected"></option>
  <?php 
	$result1=mysql_query("SELECT supervisorID,CONCAT(firstname,' ',lname) AS name FROM supervisors");
	while($row1=mysql_fetch_array($result1)){
		echo '<option value="'.$row1['supervisorID'].'">'.$row1['name'].'</option>';
	}
	
	 ?>  
  </select>
</div> 


			  <p id="enters">
			  
			  <button type="submit" name="submit"class="btn btn-primary">Save</button>
			  </p>
			 
            </form>
			</div>
			</div>
			</div>
			</div>
	<!-- -->
	
	
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">STUDENT AND THEIR PREFFERED SUPERVISORS</h3><br>			  
            </div >
			
            <!-- /.box-header -->
            <div class="box-body">	
<div id="printableTable">			
              <table id="example1" name="ss"class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student RegNO</th>
                  <th>Firstname</th>
				  <th>Surname</th>
                  <th>Project Title</th>
                  <th>Supervisor Name</th>
                </tr>
                </thead>
                <tbody>
                 <?php
				
			while ($row = mysqli_fetch_array($result)){
		
		
			echo '<tr>
					<td>'.$row['regno'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['sname'].'</td>
					<td>'. $row['projecttitle']. '</td>
					<td>'.$row['supervisorName'].'</td>
				</tr>';
		
			}
		?>              
                
                </tbody>
				
                <tfoot>
				
                <tr>
                  <th>Student RegNO</th>
                  <th>Firstname</th>
				  <th>Surname</th>
                  <th>Project Title</th>
				  <th>Supervisor Name</th>               
                </tr>
				
				</tfoot>
              </table>
			  </div>
			  </div>
			  <div class="box-footer">
                <button class="btn btn-primary" onClick="printDiv()" >Print</button>
              </div>
			  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
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
