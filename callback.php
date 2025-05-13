<?php
require_once 'vendor/autoload.php'; // Google Client via Composer

$client = new Google_Client(['client_id' => '999255951528-041h55kttsmvhgv0aua2diok6g4kra5c.apps.googleusercontent.com']); // Add your actual client ID

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get Google credential token from AJAX
$token = $_POST['credential'] ?? '';

if (!$token) {
    die("No token provided.");
}

$payload = $client->verifyIdToken($token);

if ($payload) {
    // Extract user info from Google payload
    $google_id = $payload['sub'];
    $name = $payload['name'];
    $email = $payload['email'];
    $picture = $payload['picture'];

    // DB connection
    $conn = new mysqli("localhost", "root", "", "careerhub");
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Ensure email has UNIQUE constraint in DB for ON DUPLICATE KEY to work!
    // INSERT or UPDATE user
    $stmt = $conn->prepare("
        INSERT INTO users (fullname, email, picture) 
        VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE fullname = VALUES(fullname), picture = VALUES(picture)
    ");
    $stmt->bind_param("sss", $name, $email, $picture);
    
    if (!$stmt->execute()) {
        die("Insert failed: " . $stmt->error);
    }

    // Get user ID
    $user_id = $conn->insert_id;
    if ($user_id == 0) {
        // Existing user: fetch ID manually
        $stmt2 = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $stmt2->bind_result($user_id);
        $stmt2->fetch();
        $stmt2->close();
    }

    // Start session and store user data
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_picture'] = $picture;

    // Return JSON (useful if called via AJAX)
    header("Location:createprofile.html");
 
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
    exit;
}
 