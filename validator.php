<?php
session_start();

// initializing variables
$stdid= mt_rand(1000,9999);
$firstname = "";
$surname = "";
$regNo =  "";
$ystudy="";
$email    = "";
$password_1 = "";
$password_2 = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projecttracker');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['fname']);
  $surname = mysqli_real_escape_string($db, $_POST['sname']);
  $regNo = mysqli_real_escape_string($db, $_POST['regno']);
  $ystudy = mysqli_real_escape_string($db, $_POST['study']);
  $email = mysqli_real_escape_string($db, $_POST['mail']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass-1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pass-2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "firstname is required"); }
  if (empty($surname)) { array_push($errors, "Surname is required"); }
  if (empty($regNo)) { array_push($errors, "Registration Number is required"); }
  if (empty($ystudy)) { array_push($errors, "Year of study is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registration WHERE regNo='$regNo' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['regNo'] === $regNo) {
      array_push($errors, "The registration number given already exist. Try Again.");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO registration (studentID,fname,sname,regno, email, password,year) 
  			  VALUES('$stdid','$firstname','$surname','$regNo','$email','$password_1','$ystudy')";
  	mysqli_query($db, $query);
  	$_SESSION['firstname'] = $firstname;
  	$_SESSION['success'] = "SUCCESS";
  	header('location: index.php');
  }
}

// ... 




?>
