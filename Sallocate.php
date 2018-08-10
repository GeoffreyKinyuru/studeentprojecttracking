<?php

// initializing variables
$ids= mt_rand(1000,9999);
$stdfullname=" ";
$sfullname=" ";


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projecttracker');

// REGISTER USER
if (isset($_POST['submit'])) {
	
	
	
  // receive all input values from the form
  $stdfullname = $_POST['student'];
  $sfullname =$_POST['supervisor'];
  
  //check for empty fields
  if (empty($stdfullname) || empty($sfullname)) { 
  unset($_SESSION['allocatesuccess']);
  array_push($errors, "All fields are required"); 
  }
 // if (empty($sfullname)) { array_push($errors, "project category is required"); }

  //check if a student has a supervisor already
  $user_check_query = "SELECT * FROM student_supervisor WHERE studentID='$stdfullname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['studentID'] === $stdfullname) {		
	unset($_SESSION['allocatesuccess']);
      array_push($errors,"Sorry, A supervisor is already assigned to that student.");
	   
    }

  }
		
if (count($errors) == 0) {
	
		
   $query = "INSERT INTO student_supervisor (ID,studentID,supervisorID)
	VALUES('$ids','$stdfullname','$sfullname')";
	
	$result1=mysqli_query($db,"SELECT CONCAT(firstname,' ',lname) AS name FROM supervisors WHERE supervisorID='$sfullname' ");
	$row1=mysqli_fetch_array($result1);
		
	$names=$row1['name'];
		
	$sName= "UPDATE registration SET supervisorName='$names' WHERE studentID='$stdfullname' ";
	
  if(mysqli_query($db, $query)){
	  if(mysqli_query($db,$sName)){
	$_SESSION['allocatesuccess'] = "SUCCESS";
  	header('location: supervisorAllocation.php');
		
  }else{
	  
		unset($_SESSION['allocatesuccess']);
		echo mysqli_error($db);
	
  }
	}
	else{
		unset($_SESSION['allocatesuccess']);
		}
  
}
}
?>
