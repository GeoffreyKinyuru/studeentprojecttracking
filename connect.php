<?php
$conn = new mysqli("localhost", "root", "","projecttracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	
}


?>