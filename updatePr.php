<?php
include('connect.php');
$id= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w14"]) ) {

      $stdregs4 = $_GET["w14"] ;
//check if action already taken
  
      
	  $mquery4="SELECT studentID FROM registration WHERE regno = '$stdregs4'";
	  $result234=mysqli_query($conn,$mquery4);
		$row234=mysqli_fetch_assoc($result234);
		
        $stdids=$row234['studentID'];		
		
      $sNames4= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdids' ");
	  if(!$sNames4){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer4 = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdids'";
  $resultss4 = mysqli_query($conn, $user_check_quer4);
  $projectss4 = mysqli_fetch_assoc($resultss4);
  
   // if user exists
   if($projectss4){
    if ($projectss4[ 'COUNT(studentID)'] >= 1) {		
     
    }else{ array_push($errors,"Sorry!! Your concepts/records doestn't exit");
	   
		
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryy4 = "SELECT concept FROM approvals WHERE studentID='$stdids' ";
  $resul4 = mysqli_query($conn, $user_check_queryy4);
  $conce4 = mysqli_fetch_assoc($resul4);
  
  if ($conce4) { // if user exists
    if ($conce4['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	   
    }

  }
  
  //check if DFD data exists;
   
   $user_check_queryy44 = "SELECT dfd FROM approvals WHERE studentID='$stdids' ";
  $resul44 = mysqli_query($conn, $user_check_queryy44);
  $conce44 = mysqli_fetch_assoc($resul44);
  
  if ($conce44) { // if user exists
    if ($conce44['dfd']==="") {		
      array_push($errors,"You cannot act on Proposals before DFDs");
	   
    }

  }
  //check if Proposal data exists;
   
   $user_check_queryy45 = "SELECT proposal FROM approvals WHERE studentID='$stdids' ";
  $resul45 = mysqli_query($conn, $user_check_queryy45);
  $conce45 = mysqli_fetch_assoc($resul45);
  
  if ($conce45) { // if user exists
    if ($conce45['proposal']==="") {		
      array_push($errors,"You cannot act on Progress before Proposal");
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_Query="SELECT studentID, projectID FROM projects WHERE studentID='$stdids'";
	  $result3=mysqli_query($conn,$Select_Query);
		$rows=mysqli_fetch_assoc($result3);
		
		$studs = $rows['studentID'];
		$project = $rows['projectID'];
		//echo $stud;		
		
	
		
	$dups= mysqli_query($conn,"UPDATE approvals SET progress='Declined' WHERE studentID='$studs' ");
	  if(!$dups){echo mysqli_error($conn);}else{echo "success";}

   }else{
	  echo mysqli_error($conn);
  }
}


?>

<?php
include('connect.php');
$idG= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w14G"]) ) {

      $stdregs4G = $_GET["w14G"] ;
//check if action already taken
  
      
	  $mquery4G="SELECT studentID FROM registration WHERE regno = '$stdregs4G'";
	  $result234G=mysqli_query($conn,$mquery4G);
		$row234G=mysqli_fetch_assoc($result234G);
		
        $stdidsG=$row234G['studentID'];		
		
      $sNames4G= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidsG' ");
	  if(!$sNames4G){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer4G = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidsG'";
  $resultss4G = mysqli_query($conn, $user_check_quer4G);
  $projectss4G = mysqli_fetch_assoc($resultss4G);
  
   // if user exists
   if($projectss4G){
    if ($projectss4G[ 'COUNT(studentID)'] >= 1) {		
     
    }else{ array_push($errors,"Sorry!! Your concepts/records doestn't exit");
	   
		
	}

   }else{}
   //check if concepts data exists;
   
   $user_check_queryy4G = "SELECT concept FROM approvals WHERE studentID='$stdidsG' ";
  $resul4G = mysqli_query($conn, $user_check_queryy4G);
  $conce4G = mysqli_fetch_assoc($resul4G);
  
  if ($conce4G) { // if user exists
    if ($conce4G['concept']==="") {		
      array_push($errors,"You cannot act on DFDs before Concepts");
	   
    }

  }
  
  //check if DFD data exists;
   
   $user_check_queryy44G = "SELECT dfd FROM approvals WHERE studentID='$stdidsG' ";
  $resul44G = mysqli_query($conn, $user_check_queryy44G);
  $conce44G = mysqli_fetch_assoc($resul44G);
  
  if ($conce44G) { // if user exists
    if ($conce44G['dfd']==="") {		
      array_push($errors,"You cannot act on Proposals before DFDs");
	   
    }

  }
  //check if Proposal data exists;
   
   $user_check_queryy45G = "SELECT proposal FROM approvals WHERE studentID='$stdidsG' ";
  $resul45G = mysqli_query($conn, $user_check_queryy45G);
  $conce45G = mysqli_fetch_assoc($resul45G);
  
  if ($conce45G) { // if user exists
    if ($conce45G['proposal']==="") {		
      array_push($errors,"You cannot act on Progress before Proposal");
	   
    }

  }
  
  //check if CONCEPT/DFD/PROGRESS was approved;
   
   $user_check_queryyPG = "SELECT concept,dfd,progress FROM approvals WHERE studentID='$stdidsG' ";
  $resulPG = mysqli_query($conn, $user_check_queryyPG);
  $concePG = mysqli_fetch_assoc($resulPG);
  
  if ($concePG) { // if user exists
    if ($concePG['concept']==="Declined" || $concePG['dfd']==="Declined") {		
      array_push($errors,"Sorry! Either your Concept,DFD or Proposal had not been approved");
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_QueryG="SELECT studentID, projectID FROM projects WHERE studentID='$stdidsG'";
	  $result3G=mysqli_query($conn,$Select_QueryG);
		$rowsG=mysqli_fetch_assoc($result3G);
		
		$studsG = $rowsG['studentID'];
		$projectG = $rowsG['projectID'];
		//echo $stud;		
		
	
		
	$dupsG= mysqli_query($conn,"UPDATE approvals SET progress='Approved' WHERE studentID='$studsG' ");
	  if(!$dupsG){echo mysqli_error($conn);}else{echo "success";}

   }else{
	  echo mysqli_error($conn);
  }
}


?>