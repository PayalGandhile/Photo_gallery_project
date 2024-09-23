<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "gallery";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection

  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


?>