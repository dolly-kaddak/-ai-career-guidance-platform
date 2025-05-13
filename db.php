<?php
$host = 'localhost';  // or '127.0.0.1'
$user = 'root';       // Default MySQL username
$password = '';       // Leave empty if no password
$database = 'career_roadmap';  // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
