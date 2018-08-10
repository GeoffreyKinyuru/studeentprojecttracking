<?php
session_start();
// initializing variables
$ids= mt_rand(1000,9999);
$studid="";
$sta="pending";
$ptitle = "";
$catego = "";
$ystudy="";


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projecttracker');

// REGISTER USER
if (isset($_POST['submit'])) {
	
	
	
  // receive all input values from the form
  $ptitle = mysqli_real_escape_string($db, $_POST['title']);
  $catego = mysqli_real_escape_string($db, $_POST['category']);
  $ystudy = mysqli_real_escape_string($db, $_POST['year']);

  if (empty($ptitle)) { array_push($errors, "Project title is required"); }
  if (empty($catego)) { array_push($errors, "project category is required"); }
  if (empty($ystudy)) { array_push($errors, "Project year is required"); }
  
  

  // first check the database to make sure 
  // a project does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM projects WHERE projecttitle='$ptitle' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $project = mysqli_fetch_assoc($result);
  
  if ($project) { // if user exists
    if ($project['projecttitle'] === $ptitle) {		
      array_push($errors,"Sorry, project is already taken. Try again");
	  
	   
    }

  }
  
 // check if a student has not more than two projects.
 
 $sessid = $_SESSION["username"];
		$retrivestudid = "SELECT studentID FROM registration WHERE email = '$sessid'";
		$results2=mysqli_query($db,$retrivestudid);
		$row=mysqli_fetch_assoc($results2);
		
        $studid=$row['studentID'];
 
   $user_check_query2 = "SELECT COUNT(studentID) FROM projects WHERE studentID='$studid'";
  $results = mysqli_query($db, $user_check_query2);
  $projects = mysqli_fetch_assoc($results);
  
   // if user exists
   if($projects){
    if ($projects[ 'COUNT(studentID)'] >= 2) {		
      array_push($errors,"A STUDENT CAN REGISTER A MAXIMUM OF TWO PROJECTS");
	   
    }

   }
   //check if a student is in forth year
   
   $retrivestudidy = "SELECT year FROM registration WHERE studentID = '$studid'";
		$results2y=mysqli_query($db,$retrivestudidy);
		$rowy=mysqli_fetch_assoc($results2y);
		
        //$studidy=$rowy['studentID'];
		if($rowy){
			if($rowy['year']===4){
				array_push($errors,"A fourth year student can only submit one project");
			}
		}
   
  //check if a study has registered at least one project in a given academic year.
  
  $queryno = "SELECT COUNT(year) FROM projects WHERE year = $ystudy AND studentID = '$studid'";
  $resultno = mysqli_query($db, $queryno);
  $projectno = mysqli_fetch_assoc($resultno);
  
   if($projectno){
    if ($projectno[ 'COUNT(year)'] > 0) {		
      array_push($errors,"Sorry ! Currently, only one project can be registered per academic year");
	   
    }

   }
  
  
  // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
		$ssid = $_SESSION["username"];
		$retrivestdid = "SELECT studentID FROM registration WHERE email = '$ssid'";
		$result2=mysqli_query($db,$retrivestdid);
		$row=mysqli_fetch_assoc($result2);
		
        $stdid=$row['studentID'];
		echo $stdid;
    	$query = "INSERT INTO projects (projectID,studentID,projecttitle,Category,status,year)
	VALUES('$ids','$stdid','$ptitle','$catego','$sta','$ystudy')";
		
  if(mysqli_query($db, $query)){
	$_SESSION['success'] = "SUCCESS";
  	header('location: advanced.php');
		
  }else{
	  echo mysqli_error($db);
  }
	}
	
}

?>
