<?php
// Database credentials
$host = 'localhost';      // Hostname (use 'localhost' if running MySQL locally)
$username = 'root';       // Default MySQL username in XAMPP
$password = '';           // Default password in XAMPP (use '' if no password)
$dbname = 'visitor_system'; // The name of your database

// Create a new connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection fails, stop the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}
?>
