<?php

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) && empty($_POST['pass'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['email'];
$password=$_POST['pass'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($connection,"studentprojectstracking");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select * from registration where password='$password' AND email='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.html"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>