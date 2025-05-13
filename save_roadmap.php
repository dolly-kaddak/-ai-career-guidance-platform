<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    die(json_encode(["success" => false, "error" => "No data received"]));
}

$career_path = $data['title'] ?? '';
$steps = $data['steps'] ?? '';

// Validate inputs
if (empty($career_path) || empty($steps)) {
    die(json_encode(["success" => false, "error" => "Career path or steps are empty"]));
}

// Sanitize data
$career_path = mysqli_real_escape_string($conn, $career_path);
$steps = mysqli_real_escape_string($conn, $steps);

// Insert into roadmaps table
$sql = "INSERT INTO roadmaps (career_path, skills) VALUES ('$career_path', '$steps')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
