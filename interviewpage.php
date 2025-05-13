<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ai_career_hub"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

$user_id = 1; // Change this dynamically based on logged-in user

$sql = "SELECT * FROM quiz_results WHERE user_id = '$user_id' ORDER BY timestamp DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Quizzes</title>
    <style>
        /* Global Styles */
        body {
            background: radial-gradient(circle at top, #1a1a2e, #000);
            color: #fff;
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container */
        .container {
            max-width: 800px;
            width: 90%;
            padding: 20px;
            text-align: center;
            backdrop-filter: blur(10px);
            border-radius: 12px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: linear-gradient(45deg, cyan, blueviolet);
            -webkit-background-clip: text;
            color: transparent;
        }

        .header button {
            background: linear-gradient(45deg, cyan, blueviolet);
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .header button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(138, 43, 226, 0.6);
        }

        /* Description */
        .description {
            font-size: 16px;
            color: #aaa;
            margin-bottom: 30px;
        }

        /* Quiz Card */
        .quiz {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
        }

        .quiz:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 255, 255, 0.3);
            backdrop-filter: blur(15px);
        }

        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .quiz-header h2 {
            font-size: 20px;
            font-weight: bold;
            color: cyan;
        }

        .quiz-header span {
            color: #aaa;
            font-size: 14px;
        }

        .quiz p {
            color: #ccc;
            font-size: 15px;
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Recent Quizzes</h1>
            <button onclick="window.location.href='startq.php'">Start New Quiz</button>
        </div>
        <p class="description">Review your past quiz performance</p>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $attempt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="quiz" onclick="window.location.href=\'quiz_detail.php?id=' . $row['id'] . '\'">'; 
                echo '<div class="quiz-header">';
                echo '<h2>Quiz Attempt ' . $attempt . '</h2>';
                echo '<span>' . date("F d, Y H:i", strtotime($row['timestamp'])) . '</span>';
                echo '</div>';
                echo '<p>Score: <strong style="color: ' . getScoreColor($row['score']) . ';">' . $row['score'] . '%</strong></p>';
                echo '</div>';
                $attempt++;
            }
        } else {
            echo "<p>No quizzes taken yet.</p>";
        }

        function getScoreColor($score) {
            if ($score >= 80) return 'limegreen';
            if ($score >= 50) return 'orange';
            return 'red';
        }
        ?>
    </div>
</body>
</html>
