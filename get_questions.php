<?php
header("Content-Type: application/json");

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ai_career_hub"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Fetch 10 random questions
$sql = "SELECT id, question_text, option_a, option_b, option_c, option_d, correct_option, explanation FROM questions ORDER BY RAND() LIMIT 10";
$result = $conn->query($sql);

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

echo json_encode($questions);
$conn->close();
?>
