<?php
session_start();
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ai_career_hub';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$industry = $_POST['industry'];
$specialization = $_POST['specialization'];
$experience = $_POST['experience'];
$skills = $_POST['skills'];
$bio = $_POST['bio'];


// Prepare SQL query
$sql = "INSERT INTO profiles (name, email, industry, specialization, experience, skills, bio) 
        VALUES ('$name', '$email', '$industry', '$specialization', '$experience', '$skills', '$bio')";

// Execute query
if ($conn->query($sql) === TRUE) {
    // Get the last inserted ID
    $last_id = $conn->insert_id;
    $_SESSION['create_id'] = $last_id; // Set session ID to the last inserted ID

    echo "<script>alert('Profile Completed Successfully!'); window.location.href='insights.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>