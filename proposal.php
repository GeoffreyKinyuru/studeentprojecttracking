<?php 
session_start();
include('connect.php');
include('updateP.php');
$seid=$_SESSION['username'];
$Select_Query="SELECT regno,fname,sname,registration.year,projects.projecttitle,projects.status FROM registration,projects WHERE registration.studentID=projects.studentID AND registration.year = projects.year  ";
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
  <title>Proposal Approval @ MMUST Student Project Tracking System</title>
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
 
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../htmlprintcss.css"/>

  <link rel="stylesheet" href="style.css"/>
  
 <script src="../../htmlprintjs.js"></script>
 <link rel="stylesheet" href="jj.css"/>
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
            <li><a href="#"><i class="fa fa-circle-o"></i> 3rd Years</a></li>
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
            <li><a href="DFD.php"><i class="fa fa-circle-o"></i> DFDs Approval</a></li>
			<li><a href="proposal.php"><i class="fa fa-circle-o"></i> Proposals Approval</a></li>
            <li><a href="progress.php"><i class="fa fa-circle-o"></i> Progress Assessment</a></li>
			<li><a href="final.php"><i class="fa fa-circle-o"></i> Final Assessment</a></li>
            
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
        PROPOSAL APPROVAL
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Assessment</a></li>
        <li class="active">proposal Approval</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	
	
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
		  <?php include('errors.php');?>
		  <?php
		  if(isset($_SESSION['propsuccess'])){
	echo "<div class='alert alert-success alert-dismissible'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong></div>";
}else{}	
		  ?>
            <div class="box-header">
              <h3 class="box-title">PROPOSALS</h3>
            </div>
            <!-- /.box-header -->
			
            <div class="box-body">
					
			<div id="printableTable">
			<form id="myForm" action="#" method="POST">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="head">
                  <th>Reg NO</th>
                  <th>Firstname</th>
                  <th>Surname</th>
				  <th>Year of study</th>
                  <th>Project Title</th>  
				  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                 <?php
				
			while ($row = mysqli_fetch_array($result))
		{
		
			echo '<tr>
					<td id="must">'.$row['regno'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['sname'].'</td>
					<td>'. $row['year']. '</td>
					<td>'.$row['projecttitle'].'</td>	
					<td id="tb">'. $row['status']. '</td>
				</tr>';
			
		}?>
                
                </tbody>
				
                <tfoot>
                
                </tfoot>
				
              </table>
			  </form>
			  </div>
			  
            </div>
			<div class="box-footer">
			<div id="btns">
                
				<button type="button" id="my"class="btn btn-success" onClick="myFunction2()">Approve</button>
				
				<button type="button" id="my"class="btn btn-warning" onClick="decline()">Decline</button>
				
				
				
				<button id="my"class="btn btn-primary" onClick="printDiv()" >Print</button>
			</div>	
				</div>
			  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
			  
		


<script>
function myFunction2(){
	var myTable = document.getElementById("example1");
	for (i = 1; i < myTable.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTable.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 5; j < objCells.length; j++) {
                
				if(objCells.item(j).innerHTML="pending"){
					objCells.item(j).innerHTML="Approved";
					objCells.item(j).style.color="white";
					objCells.item(j).style.background="green";
					
				}else{
					objCells.item(j)="";
				}
            }
          
        }
	var reg3P = document.getElementById('example1').rows[1].cells.item(0).innerHTML;

			window.location.href = "proposal.php?w13P="+reg3P ;
}
</script>
<script>

function decline(){
	var decline = document.getElementById("example1");
	for (i = 1; i < decline.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = decline.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 5; j < objCells.length; j++) {
				
				if([objCells.item(j).innerHTML="pending"] || [objCells.item(j).innerHTML="Approved"]){
					objCells.item(j).innerHTML="Declined";
					objCells.item(j).style.color="white";
					objCells.item(j).style.background="red";
					
					
				}else{
					objCells.item(j)="";
				}
				
            }
			
					
        }
		var reg3 = document.getElementById('example1').rows[1].cells.item(0).innerHTML;

			window.location.href = "proposal.php?w13="+reg3 ;
}


</script>
			
			
			  
			  
			  
			  
			  
			  
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
