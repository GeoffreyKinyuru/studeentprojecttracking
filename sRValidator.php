<?php
session_start();
// initializing variables
$ids= mt_rand(1000,9999);
$fname="";
$lname="pending";
$email= "";
$catego = "";
$success="The Data Entry was successful.";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projecttracker');

// REGISTER USER
if (isset($_POST['submit'])) {
	
	
	
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['first']);
  $lname = mysqli_real_escape_string($db, $_POST['last']);
  $catego = mysqli_real_escape_string($db, $_POST['category']);
  $email = mysqli_real_escape_string($db, $_POST['mail']);
  


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "firstname is required"); }
  
  if (empty($catego)) { array_push($errors, "lecture's domain is required"); }
  if (empty($lname)) { array_push($errors, $fname); }
  if (empty($email)) { array_push($errors, "email is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM supervisors WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $project = mysqli_fetch_assoc($result);
  
  if ($project) { // if user exists
    if ($project['email'] === $email) {	
unset($_SESSION['success']);	
      array_push($errors,"Sorry, Someone has been registered under that email address. Try again");
	   
    }

  }
  //check if a student has not more than two projects.
   //$user_check_query2 = "SELECT COUNT(studentId) FROM projects WHERE studentId='$studid'";
  //$results = mysqli_query($db, $user_check_query2);
 // $projects = mysqli_fetch_assoc($results);
  
  //if ($projects) { // if user exists
   // if ($projects[ 'COUNT(studentId)'] <= 2) {		
   //   array_push($errors,"A STUDENT CAN REGISTER A MAXIMUM OF TWO PROJECTS");
	   
   // }

 // }
  
  // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
		/*$sessid = $_SESSION["username"];
		$retrivestudid = "SELECT studentID FROM registration WHERE email = '$sessid'";
		$results2=mysqli_query($db,$retrivestudid);
		$row=mysqli_fetch_assoc($results2);
		
        $studid=$row['studentID'];*/
		
		
		
		
    $query = "INSERT INTO supervisors (supervisorID,firstname,lname,domain,email)
	VALUES('$ids','$fname','$lname','$catego','$email')";
		
  mysqli_query($db, $query);
  
  

	$_SESSION['success'] = " ";
	//echo $session['success'];
  	header('location: supervisorRegister.php');
		

	}else{
		unset($_SESSION['success']);
	}
	
}

?>
