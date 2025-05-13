<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";  // Default password is empty
$dbname = "ai_career_hub";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
