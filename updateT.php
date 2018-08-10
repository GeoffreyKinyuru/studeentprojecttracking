<?php
include('connect.php');
$id= mt_rand(1000,9999);
$errors = array(); 
$er=" ";
if (isset($_GET["w1"]) ) {

      $stdreg = $_GET["w1"] ;
//check if action already taken
  
      
	  $query="SELECT studentID,year FROM registration WHERE regno = '$stdreg'";
	  $result2=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result2);
		
        $stdid=$row['studentID'];	
        
		
      $sName= mysqli_query($conn,"UPDATE projects SET status='Declined' WHERE studentID='$stdid'");
	  if(!$sName){echo mysqli_error($conn);}else{echo "";}
	  
		
	  //check if data already exists
	  
$user_check_queri = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdid'";
  $resultssi = mysqli_query($conn, $user_check_queri);
  $projectssi = mysqli_fetch_assoc($resultssi);
  
   // if user exists
   if($projectssi){
    if ($projectssi[ 'COUNT(studentID)'] >= 1) {
		
      $dupAd= mysqli_query($conn,"UPDATE approvals SET concept='Declined' WHERE studentID='$stdid' ");
	  if(!$dupAd){echo mysqli_error($conn);
	  }else{
		  $_SESSION['conceptsuccess']=" ";
		 
		  }
	   
    }else{$er = "Yes";unset($_SESSION['conceptsuccess']);
	$sName= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdid' ");
	  if(!$sName){echo mysqli_error($conn);}else{echo "";}
	}

   }
  
  //Send data to Approveed Table
  if($er==="Yes"){
   
   
  
	  $Select_Query="SELECT studentID,projectID,year FROM projects WHERE studentID='$stdid' ";
	  $result3=mysqli_query($conn,$Select_Query);
		$rows=mysqli_fetch_assoc($result3);
		
		$stud = $rows['studentID'];
		$project = $rows['projectID'];
		//echo $stud;		
	echo $tt;
		$approve= mysqli_query($conn,"INSERT INTO approvals (ID,studentID,projectID,concept,dfd,proposal,progress,final)
	VALUES('$id','$stud','$project','Declined',' ',' ',' ',' ')");
	if(!$approve){echo mysqli_error($conn);
	}else{ 
	$_SESSION['conceptsuccess']=" ";
	}
	    
}
}

?>
<?php
include('connect.php');
$idA= mt_rand(1000,9999);
$errors = array(); 
$NN="";
if (isset($_GET["w1A"]) ) {

      $stdregA = $_GET["w1A"] ;
//check if action already taken
  
      
	  $queryA="SELECT studentID FROM registration WHERE regno = '$stdregA'";
	  $result2A=mysqli_query($conn,$queryA);
		$rowA=mysqli_fetch_assoc($result2A);
		
        $stdidA=$rowA['studentID'];		
		
      $sNameA= mysqli_query($conn,"UPDATE projects SET status='Approved' WHERE studentID='$stdidA' ");
	  if(!$sNameA){echo mysqli_error($conn);}else{}
	  
		
	  //check if data already exists
	  
$user_check_querA = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidA'";
  $resultssA = mysqli_query($conn, $user_check_querA);
  $projectssA= mysqli_fetch_assoc($resultssA);
  
   // if user exists
   if($projectssA){
    if ($projectssA[ 'COUNT(studentID)'] >= 1) {
		
      $dupA= mysqli_query($conn,"UPDATE approvals SET concept='Approved' WHERE studentID='$stdidA' ");
	  if(!$dupA){echo mysqli_error($conn);}else{
		  array_push($errors,"similar record found");
		  unset($_SESSION['conceptFsuccess']);
		  unset($_SESSION['conceptsuccess']);
		  
		  
	  $queryA="SELECT studentID FROM registration WHERE regno = '$stdregA'";
	  $result2A=mysqli_query($conn,$queryA);
		$rowA=mysqli_fetch_assoc($result2A);
		
        $stdidA=$rowA['studentID'];		
		
      $sNameA= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidA' ");
	  if(!$sNameA){echo mysqli_error($conn);}else{}
		  //echo "success";
		  }
	   
	  
    }else{$NN="yes";
	unset($_SESSION['conceptFsuccess']);
	}

   }
  
  //Send data to Approveed Table
  if($NN==="yes"){
  
	  $Select_QueryA="SELECT studentID, projectID FROM projects WHERE studentID='$stdidA'";
	  $result3A=mysqli_query($conn,$Select_QueryA);
		$rowsA=mysqli_fetch_assoc($result3A);
		
		$studA = $rowsA['studentID'];
		$projectA = $rowsA['projectID'];
		//echo $stud;		
	
		$approveA= mysqli_query($conn,"INSERT INTO approvals (ID,studentID,projectID,concept,dfd,proposal,progress,final)
	VALUES('$idA','$studA','$projectA','Approved',' ',' ',' ',' ')");
	if(!$approveA){echo mysqli_error($conn);}else{
		
		$_SESSION['conceptsuccess']=" ";
	}
	  
   
}
}


?>
