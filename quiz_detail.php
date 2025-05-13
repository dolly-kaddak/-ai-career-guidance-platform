<?php
// Include database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ai_career_hub"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Check if an ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid quiz ID.");
}

// Sanitize the input to prevent SQL injection
$quiz_id = intval($_GET['id']);

// Fetch quiz details
$query = "SELECT * FROM quiz_results WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $quiz_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if quiz exists
if ($result->num_rows === 0) {
    die("Quiz not found.");
}

$quiz = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Results - AI Theme</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(145deg, #202a44, #0c0f1c);
      color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      position: relative;
    }

    .container {
      background: rgba(255, 255, 255, 0.03);
      padding: 40px;
      border-radius: 20px;
      border: 4px solid black;
      box-shadow: 0 0 40px rgba(0, 255, 255, 0.08);
      text-align: center;
      backdrop-filter: blur(24px);
      max-width: 600px;
      width: 90%;
      z-index: 2;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 24px;
      color: #00ffff;
      text-shadow: 0 0 12px rgba(0, 255, 255, 0.3);
    }

    .quiz-details {
      background: rgba(255, 255, 255, 0.025);
      border-radius: 20px;
      padding: 24px;
      margin-bottom: 20px;
      box-shadow: inset 0 0 18px rgba(138, 43, 226, 0.1);
    }

    .quiz-details p {
      margin: 10px 0;
      font-size: 1rem;
      color: #e0e0e0;
    }

    .highlight {
      color: #ff5edb;
      font-weight: 600;
    }

    .back-btn {
      background: linear-gradient(45deg, #00ffff, #ff5edb);
      color: #fff;
      padding: 12px 28px;
      border: none;
      border-radius: 14px;
      font-weight: 600;
      text-decoration: none;
      box-shadow: 0 6px 18px rgba(0, 255, 255, 0.2);
      transition: all 0.3s ease;
      display: inline-block;
    }

    .back-btn:hover {
      transform: scale(1.06);
      box-shadow: 0 10px 30px rgba(255, 94, 219, 0.3);
    }

    .robot-row {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      display: flex;
      justify-content: space-around;
      align-items: flex-end;
      padding: 10px;
      z-index: 1;
    }

    .robot {
      width: 120px;
      height: 120px;
      animation: float 5s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); opacity: 0.95; }
      50% { transform: translateY(-8px); opacity: 1; }
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Quiz Details</h1>
    <div class="quiz-details">
      <p><strong>Quiz ID:</strong> <span class="highlight"><?php echo $quiz['id']; ?></span></p>
      <p><strong>Score:</strong> <span class="highlight"><?php echo $quiz['score']; ?>%</span></p>
      <p><strong>Total Questions:</strong> <span class="highlight"><?php echo $quiz['total_questions']; ?></span></p>
      <p><strong>Correct Answers:</strong> <span class="highlight"><?php echo $quiz['correct_answers']; ?></span></p>
      <p><strong>Date:</strong> <span class="highlight"><?php echo date('F j, Y h:i A', strtotime($quiz['timestamp'])); ?></span></p>
    </div>
    <a href="interviewpage.php" class="back-btn">Back to Quizzes</a>
  </div>

  <div class="robot-row">
    <div id="robot1" class="robot"></div>
    <div id="robot2" class="robot"></div>
    <div id="robot3" class="robot"></div>
  </div>

  <script>
    const robots = [
      { id: "robot1", url: "https://lottie.host/394b68b2-6bb5-4be6-9a4b-91cc0b929aa4/MQ7nCkW9NL.json" },
      { id: "robot2", url: "https://lottie.host/63b204e4-65ae-4c5e-b35e-8dc1c79bc43c/Jtv0p2vaxO.json" },
      { id: "robot3", url: "https://lottie.host/7c9e18eb-3af1-45ac-bb4d-7ffbe21f4ad4/U6I8oZ4fEU.json" }
    ];

    robots.forEach(bot => {
      lottie.loadAnimation({
        container: document.getElementById(bot.id),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: bot.url
      });
    });
  </script>
</body>

</html>
