<?php
$host = "localhost";
$user = "root"; // Your MySQL username
$pass = "";     // Your MySQL password
$dbname = "study_planner";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
