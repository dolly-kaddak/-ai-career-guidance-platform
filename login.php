<?php
include 'db_connect.php';  // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    // Check If User Exists
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify Password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];
            echo "<script>alert('Login Successful!'); window.location='createprofile.html';</script>";
        } else {
            echo "<script>alert('Invalid Password!'); window.location='login1.html';</script>";
        }
    } else {
        echo "<script>alert('User not found! Please Register.'); window.location='register.html';</script>";
    }
}
$conn->close();
?>
