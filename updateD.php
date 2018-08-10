<?php
include('connect.php');
$id= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w12"]) ) {

      $stdregs = $_GET["w12"] ;
//check if action already taken
  
      
	  $mquery="SELECT studentID FROM registration WHERE regno = '$stdregs'";
	  $result23=mysqli_query($conn,$mquery);
		$row23=mysqli_fetch_assoc($result23);
		
        $stdid=$row23['studentID'];		
		
      $sNames= mysqli_query($conn,"UPDATE projects SET status='Declined' WHERE studentID='$stdid' ");
	  if(!$sNames){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdid'";
  $resultss = mysqli_query($conn, $user_check_quer);
  $projectss = mysqli_fetch_assoc($resultss);
  
   // if user exists
   if($projectss){
    if ($projectss[ 'COUNT(studentID)'] >= 1) {		
     
    }else{ array_push($errors,"Sorry!! Your concept records doestn't exit");
	   unset($_SESSION['dfdsuccess']);
	   
	   $mquery="SELECT studentID FROM registration WHERE regno = '$stdregs'";
	  $result23=mysqli_query($conn,$mquery);
		$row23=mysqli_fetch_assoc($result23);
		
        $stdid=$row23['studentID'];		
		
      $sNames= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdid' ");
	  if(!$sNames){echo mysqli_error($conn);}else{}
		
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryy = "SELECT concept FROM approvals WHERE studentID='$stdid' ";
  $resul = mysqli_query($conn, $user_check_queryy);
  $conce = mysqli_fetch_assoc($resul);
  
  if ($conce) { // if user exists
    if ($conce['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	   unset($_SESSION['dfdsuccess']);
	   
	   $mquery="SELECT studentID FROM registration WHERE regno = '$stdregs'";
	  $result23=mysqli_query($conn,$mquery);
		$row23=mysqli_fetch_assoc($result23);
		
        $stdid=$row23['studentID'];		
		
      $sNames= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdid' ");
	  if(!$sNames){echo mysqli_error($conn);}else{}
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_Query="SELECT studentID, projectID FROM projects WHERE studentID='$stdid'";
	  $result3=mysqli_query($conn,$Select_Query);
		$rows=mysqli_fetch_assoc($result3);
		
		$stud = $rows['studentID'];
		$project = $rows['projectID'];
		//echo $stud;		
		
	
		
	$dup= mysqli_query($conn,"UPDATE approvals SET dfd='Declined' WHERE studentID='$stud' ");
	  if(!$dup){echo mysqli_error($conn);
	  }else{
		  $_SESSION['dfdsuccess']=" ";
		  }

   }else{
	  echo mysqli_error($conn);
  }
}


?>

<?php
include('connect.php');
$idD= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w12D"]) ) {

      $stdregsD = $_GET["w12D"] ;
//check if action already taken
  
      
	  $mqueryD="SELECT studentID FROM registration WHERE regno = '$stdregsD'";
	  $result23D=mysqli_query($conn,$mqueryD);
		$row23D=mysqli_fetch_assoc($result23D);
		
        $stdidD=$row23D['studentID'];		
		
      $sNamesD= mysqli_query($conn,"UPDATE projects SET status='Approved' WHERE studentID='$stdidD' ");
	  if(!$sNamesD){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_querD = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidD'";
  $resultssD = mysqli_query($conn, $user_check_querD);
  $projectssD = mysqli_fetch_assoc($resultssD);
  
   // if user exists
   if($projectssD){
    if ($projectssD[ 'COUNT(studentID)'] >= 1) {
		
     
    }else{ array_push($errors,"Sorry!! Your concept records doestn't exit");
	   
		
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryyD = "SELECT concept FROM approvals WHERE studentID='$stdidD' ";
  $resulD = mysqli_query($conn, $user_check_queryyD);
  $conceD = mysqli_fetch_assoc($resulD);
  
  if ($conceD) { // if user exists
    if ($conceD['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	   unset($_SESSION['dfdsuccess']);
	   
	   $mqueryD="SELECT studentID FROM registration WHERE regno = '$stdregsD'";
	  $result23D=mysqli_query($conn,$mqueryD);
		$row23D=mysqli_fetch_assoc($result23D);
		
        $stdidD=$row23D['studentID'];		
		
      $sNamesD= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidD' ");
	  if(!$sNamesD){echo mysqli_error($conn);}else{}
	   
    }

  }
  //check if concepts was Approved ;
   
   $user_check_queryyD2 = "SELECT concept FROM approvals WHERE studentID='$stdidD' ";
  $resulD2 = mysqli_query($conn, $user_check_queryyD2);
  $conceD2 = mysqli_fetch_assoc($resulD2);
  
  if ($conceD2) { // if user exists
    if ($conceD2['concept']==="Declined") {		
      array_push($errors,"Sorry! Your Concept Had not been approved");
	   unset($_SESSION['dfdsuccess']);
	   
	   $mqueryD="SELECT studentID FROM registration WHERE regno = '$stdregsD'";
	  $result23D=mysqli_query($conn,$mqueryD);
		$row23D=mysqli_fetch_assoc($result23D);
		
        $stdidD=$row23D['studentID'];		
		
      $sNamesD= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidD' ");
	  if(!$sNamesD){echo mysqli_error($conn);}else{}
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_QueryD="SELECT studentID, projectID FROM projects WHERE studentID='$stdidD'";
	  $result3D=mysqli_query($conn,$Select_QueryD);
		$rowsD=mysqli_fetch_assoc($result3D);
		
		$studD = $rowsD['studentID'];
		$projectD = $rowsD['projectID'];
		//echo $stud;		
		
	
		
	$dupD= mysqli_query($conn,"UPDATE approvals SET dfd='Approved' WHERE studentID='$studD' ");
	  if(!$dupD){echo mysqli_error($conn);
	  }else{
		  $_SESSION['dfdsuccess']=" ";
		  
		  }

   }else{
	  echo mysqli_error($conn);
  }
}


?>