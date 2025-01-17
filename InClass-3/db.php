<?php
// Database connection configuration
$host = "127.0.0.1";
$username = "root";
$password = "ccbst@123"; // Update with your MySQL password
$database = "ccbst";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
