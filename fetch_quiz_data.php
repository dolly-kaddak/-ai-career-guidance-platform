<?php
// Database Connection
$host = 'localhost'; 
$user = 'root';  
$pass = ''; 
$dbname = 'ai_career_hub';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Fetch Average Score, Total Questions Practiced, Latest Score
$query = "SELECT 
            ROUND(AVG(score),2) AS avg_score,
            SUM(total_questions) AS total_questions_practiced,
            (SELECT score FROM quiz_results ORDER BY timestamp DESC LIMIT 1) AS latest_score
          FROM quiz_results";

$result = $conn->query($query);
$stats = $result->fetch_assoc();

// Fetch Performance Data (Last 5 Quiz Scores)
$performance_query = "SELECT DATE_FORMAT(timestamp, '%b %d') AS quiz_date, score 
                      FROM quiz_results ORDER BY timestamp DESC LIMIT 5";
$performance_result = $conn->query($performance_query);

$performance_data = [];
while ($row = $performance_result->fetch_assoc()) {
    $performance_data[] = $row;
}

// Return JSON Data
echo json_encode([
    "stats" => $stats,
    "performance" => $performance_data
]);

$conn->close();
?>
