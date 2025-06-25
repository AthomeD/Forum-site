<?php
// Database configuration
$servername = "localhost"; // Database server (use '127.0.0.1' or 'localhost')
$username = "root";        // Database username
$password = "";            // Database password
$dbname = "forum";         // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"; 
// Optional: Use for debugging only

?>
