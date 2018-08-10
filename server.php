<?php
// LOGIN USER
session_start();
$email    = "";
$password = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'projecttracker');

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($email)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "select * from registration where password='$password' AND email='$email'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results)==1) { 
  	  $_SESSION["username"] = $email;
  	  $_SESSION["success"] = "You are now logged in";
  	  header('location: indexx.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>