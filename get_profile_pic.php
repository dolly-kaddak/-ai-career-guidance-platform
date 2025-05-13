<?php
session_start();
header('Content-Type: application/json');
// $_SESSION['user_id'] = 12;
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$conn = new mysqli("localhost", "root", "", "ai_career_hub");
if ($conn->connect_error) {
    echo json_encode(['error' => 'DB error']);
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT picture FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode(['picture' => $row['picture']]);
} else {
    echo json_encode(['picture' => 'https://www.w3schools.com/howto/img_avatar.png']); // default
}
?> 