<?php
$host = 'localhost'; 
$user = 'root';  
$pass = ''; 
$dbname = 'ai_career_hub';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'];
$answers = $data['answers'];

$score = 0;
$total_questions = count($answers);
$correct_answers = 0;

// Prepare the statement for inserting answers
$insertUserAnswer = $conn->prepare("INSERT INTO users_answers (user_id, question_id, selected_option, submitted_at) VALUES (?, ?, ?, NOW())");
$insertUserAnswer->bind_param("iis", $user_id, $question_id, $selected_option);

foreach ($answers as $answer) {
    $question_id = $answer['question_id'];
    $selected_option = $answer['selected_option'];

    // Fetch correct answer
    $query = $conn->prepare("SELECT correct_option FROM questions WHERE id = ?");
    $query->bind_param("i", $question_id);
    $query->execute();
    $query->bind_result($correct_option);
    $query->fetch();
    $query->close();

    if ($selected_option === $correct_option) {
        $score++;
    }

    // Insert user answer with timestamp
    if (!$insertUserAnswer->execute()) {
        die(json_encode(["error" => "Error inserting answer: " . $insertUserAnswer->error]));
    }
}

$insertUserAnswer->close();
$correct_answers = $score;

// Insert quiz result
$insertResult = $conn->prepare("INSERT INTO quiz_results (user_id, score, total_questions, correct_answers, timestamp) VALUES (?, ?, ?, ?, NOW())");
$insertResult->bind_param("idii", $user_id, $score, $total_questions, $correct_answers);

if (!$insertResult->execute()) {
    die(json_encode(["error" => "Error inserting quiz result: " . $insertResult->error]));
}

$insertResult->close();
$conn->close();

echo json_encode(["score" => $score]);
?>
