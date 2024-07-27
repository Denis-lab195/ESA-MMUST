<?php
ini_set('memory_limit', '512M'); // Increase memory limit for the script

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esa mmust";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Display memory usage for debugging
// echo 'Memory usage: ' . memory_get_usage() . ' bytes';
?>
