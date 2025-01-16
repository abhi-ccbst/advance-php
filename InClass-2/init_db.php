<?php
// init_db.php
$host = '127.0.0.1'; // Replace with your database host
$dbname = 'ccbst'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = 'ccbst@123'; // Replace with your database password

// Establish connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
