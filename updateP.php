<?php
include('connect.php');
$id= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w13"]) ) {

      $stdregs3 = $_GET["w13"] ;
//check if action already taken
  
      
	  $mquery3="SELECT studentID FROM registration WHERE regno = '$stdregs3'";
	  $result233=mysqli_query($conn,$mquery3);
		$row233=mysqli_fetch_assoc($result233);
		
        $stdidd=$row233['studentID'];		
		
      $sNames3= mysqli_query($conn,"UPDATE projects SET status='Declined' WHERE studentID='$stdidd' ");
	  if(!$sNames3){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer3 = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidd'";
  $resultss = mysqli_query($conn, $user_check_quer3);
  $projectss = mysqli_fetch_assoc($resultss);
  
   // if user exists
   if($projectss){
    if ($projectss['COUNT(studentID)'] >= 1) {		
     
    }else{
		array_push($errors,"Sorry!! Your concept records doestn't exit");
	   
		unset($_SESSION['propsuccess']);
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryy = "SELECT concept FROM approvals WHERE studentID='$stdidd' ";
  $resul = mysqli_query($conn, $user_check_queryy);
  $conce = mysqli_fetch_assoc($resul);
  
  if ($conce) { // if user exists
    if ($conce['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	   unset($_SESSION['propsuccess']);
	   
	   $mquery3="SELECT studentID FROM registration WHERE regno = '$stdregs3'";
	  $result233=mysqli_query($conn,$mquery3);
		$row233=mysqli_fetch_assoc($result233);
		
        $stdidd=$row233['studentID'];		
		
      $sNames3= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidd' ");
	  if(!$sNames3){echo mysqli_error($conn);}else{}
	   
    }

  }
  
  //check if DFD data exists;
   
   $user_check_queryyd = "SELECT dfd FROM approvals WHERE studentID='$stdidd' ";
  $resuld = mysqli_query($conn, $user_check_queryyd);
  $conced = mysqli_fetch_assoc($resuld);
  
  if ($conced) { // if user exists
    if ($conced['dfd']==="") {		
      array_push($errors,"You cannot act on Proposals before DFDs");
	   unset($_SESSION['propsuccess']);
	   
	   $mquery3="SELECT studentID FROM registration WHERE regno = '$stdregs3'";
	  $result233=mysqli_query($conn,$mquery3);
		$row233=mysqli_fetch_assoc($result233);
		
        $stdidd=$row233['studentID'];		
		
      $sNames3= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidd' ");
	  if(!$sNames3){echo mysqli_error($conn);}else{}
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_Query="SELECT studentID, projectID FROM projects WHERE studentID='$stdidd'";
	  $result3=mysqli_query($conn,$Select_Query);
		$rows=mysqli_fetch_assoc($result3);
		
		$stud = $rows['studentID'];
		$project = $rows['projectID'];
		//echo $stud;		
		
	
		
	$dup= mysqli_query($conn,"UPDATE approvals SET proposal='Declined' WHERE studentID='$stud' ");
	  if(!$dup){echo mysqli_error($conn);
	  }else{
		  $_SESSION['propsuccess']=" ";
		  }

   }else{
	  echo mysqli_error($conn);
  }
}


?>

<?php
include('connect.php');
$idP= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w13P"]) ) {

      $stdregs3P = $_GET["w13P"] ;
//check if action already taken
  
      
	  $mquery3P="SELECT studentID FROM registration WHERE regno = '$stdregs3P'";
	  $result233P=mysqli_query($conn,$mquery3P);
		$row233P=mysqli_fetch_assoc($result233P);
		
        $stdidP=$row233P['studentID'];		
		
      $sNames3P= mysqli_query($conn,"UPDATE projects SET status='Approved' WHERE studentID='$stdidP' ");
	  if(!$sNames3P){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer3P = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidP'";
  $resultssP = mysqli_query($conn, $user_check_quer3P);
  $projectssP = mysqli_fetch_assoc($resultssP);
  
   // if user exists
   if($projectssP){
    if ($projectssP[ 'COUNT(studentID)'] >= 1) {		
     
    }else{ array_push($errors,"Sorry!! Your concept records doestn't exit");
	   
		
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryyP = "SELECT concept FROM approvals WHERE studentID='$stdidP' ";
  $resulP = mysqli_query($conn, $user_check_queryyP);
  $conceP = mysqli_fetch_assoc($resulP);
  
  if ($conceP) { // if user exists
    if ($conceP['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	    unset($_SESSION['propsuccess']);
		
		$mquery3P="SELECT studentID FROM registration WHERE regno = '$stdregs3P'";
	  $result233P=mysqli_query($conn,$mquery3P);
		$row233P=mysqli_fetch_assoc($result233P);
		
        $stdidP=$row233P['studentID'];		
		
      $sNames3P= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidP' ");
	  if(!$sNames3P){echo mysqli_error($conn);}else{}
		
    }

  }
  
  //check if DFD data exists;
   
   $user_check_queryyP = "SELECT dfd FROM approvals WHERE studentID='$stdidP' ";
  $resulP = mysqli_query($conn, $user_check_queryyP);
  $conceP = mysqli_fetch_assoc($resulP);
  
  if ($conceP) { // if user exists
    if ($conceP['dfd']==="") {		
      array_push($errors,"You cannot act on Proposals before DFDs");
	    unset($_SESSION['propsuccess']);
		
		$mquery3P="SELECT studentID FROM registration WHERE regno = '$stdregs3P'";
	  $result233P=mysqli_query($conn,$mquery3P);
		$row233P=mysqli_fetch_assoc($result233P);
		
        $stdidP=$row233P['studentID'];		
		
      $sNames3P= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidP' ");
	  if(!$sNames3P){echo mysqli_error($conn);}else{}
    }

  }
  //check if CONCEPT/DFD was approved;
   
   $user_check_queryyP = "SELECT concept,dfd FROM approvals WHERE studentID='$stdidP' ";
  $resulP = mysqli_query($conn, $user_check_queryyP);
  $conceP = mysqli_fetch_assoc($resulP);
  
  if ($conceP) { // if user exists
    if ($conceP['concept']==="Declined" || $conceP['dfd']==="Declined") {		
      array_push($errors,"Sorry! Either your Concept/DFD had not been approved");
	   unset($_SESSION['propsuccess']);
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_QueryP="SELECT studentID, projectID FROM projects WHERE studentID='$stdidP'";
	  $result3P=mysqli_query($conn,$Select_QueryP);
		$rowsP=mysqli_fetch_assoc($result3P);
		
		$studP = $rowsP['studentID'];
		$projectP = $rowsP['projectID'];
		//echo $stud;		
		
	
		
	$dupP= mysqli_query($conn,"UPDATE approvals SET proposal='Approved' WHERE studentID='$studP' ");
	  if(!$dupP){echo mysqli_error($conn);
	  }else{
		  $_SESSION['propsuccess']=" ";
		  }

   }else{
	  echo mysqli_error($conn);
  }
}


?>