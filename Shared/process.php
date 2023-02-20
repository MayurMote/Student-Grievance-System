<?php

session_start();
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "Student_Grievance_System";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>