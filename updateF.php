<?php
include('connect.php');
$id= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w15"]) ) {

      $stdregs45 = $_GET["w15"] ;
//check if action already taken
  
      
	  $mquery4="SELECT studentID FROM registration WHERE regno = '$stdregs45'";
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
  //check if Progress data exists;
   
   $user_check_queryy456 = "SELECT progress FROM approvals WHERE studentID='$stdids' ";
  $resul456 = mysqli_query($conn, $user_check_queryy456);
  $conce456 = mysqli_fetch_assoc($resul456);
  
  if ($conce456) { // if user exists
    if ($conce456['progress']==="") {		
      array_push($errors,"You cannot act on Final presentation before Progress");
	   
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
$idF= mt_rand(1000,9999);
$errors = array(); 
if (isset($_GET["w15F"]) ) {

      $stdregs45F = $_GET["w15F"] ;
//check if action already taken
  
      
	  $mquery4F="SELECT studentID FROM registration WHERE regno = '$stdregs45F'";
	  $result234F=mysqli_query($conn,$mquery4F);
		$row234F=mysqli_fetch_assoc($result234F);
		
        $stdidsF=$row234F['studentID'];		
		
      $sNames4F= mysqli_query($conn,"UPDATE projects SET status='Pending' WHERE studentID='$stdidsF' ");
	  if(!$sNames4F){echo mysqli_error($conn);}else{}
	  
	  
	  //insert data if not inserted
	  
	  
	  
		
	  //check if data already exists
	  
$user_check_quer4F = "SELECT COUNT(studentID) FROM approvals WHERE studentID='$stdidsF'";
  $resultss4F = mysqli_query($conn, $user_check_quer4F);
  $projectss4F = mysqli_fetch_assoc($resultss4F);
  
   // if user exists
   if($projectss4F){
    if ($projectss4F[ 'COUNT(studentID)'] >= 1) {		
     
    }else{ array_push($errors,"Sorry!! Your concepts/records doestn't exit");
	   
		
	}

   }else{}
   
  
  //check if previous assessment had been done;
   
   $user_check_queryy456F = "SELECT concept,dfd,proposal,progress,final  FROM approvals WHERE studentID='$stdidsF' ";
  $resul456F = mysqli_query($conn, $user_check_queryy456F);
  $conce456F = mysqli_fetch_assoc($resul456F);
  
  if ($conce456F) { // if user exists
    if ($conce456F['concept']==="" || $conce456F['dfd']==="" || $conce456F['proposal']==="" || $conce456F['progress']==="") {		
      array_push($errors,"Sorry, Previous assessments had not been completed.");
	   
    }

  }
  
  //check if CONCEPT/DFD/PROGRESS/ was approved;
   
   $user_check_queryyPF = "SELECT concept,dfd,proposal,progress,final FROM approvals WHERE studentID='$stdidsF' ";
  $resulPF = mysqli_query($conn, $user_check_queryyPF);
  $concePF = mysqli_fetch_assoc($resulPF);
  
  if ($concePF) { // if user exists
    if ($concePF['concept']==="Declined" || $concePF['dfd']==="Declined" || $concePF['proposal']==="Declined" || $concePF['progress']==="Declined" || $concePF['final']==="Declined" ) {		
      array_push($errors,"Sorry! Either your Concept,DFD, Proposal,Progress had not been approved");
	   
    }

  }
  
  //Send data to Approveed Table
  if(count($errors) === 0){
	  $Select_QueryF="SELECT studentID, projectID FROM projects WHERE studentID='$stdidsF'";
	  $result3F=mysqli_query($conn,$Select_QueryF);
		$rowsF=mysqli_fetch_assoc($result3F);
		
		$studsF = $rowsF['studentID'];
		$projectF = $rowsF['projectID'];
		//echo $stud;		
		
	
		
	$dupsF= mysqli_query($conn,"UPDATE approvals SET final='Approved' WHERE studentID='$studsF' ");
	  if(!$dupsF){echo mysqli_error($conn);}else{echo "success";}

   }else{
	  echo mysqli_error($conn);
  }
}


?>