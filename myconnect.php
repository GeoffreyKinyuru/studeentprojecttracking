<?php
$conn = new mysqli("localhost", "root", "","projecttracker");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>