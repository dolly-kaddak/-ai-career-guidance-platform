<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            border: 2px solid #fff;
            border-radius: 10px;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        button {
            background-color: #fff;
            color: #000;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Start Quiz</h1>
        <p>Get ready to test your knowledge! Click the button below to begin the quiz.</p>
        <button onclick="startQuiz()">Start Quiz</button>
    </div>

    <script>
        function startQuiz() {
            alert("Quiz Started!");
            // You can redirect to the quiz page or start the quiz logic here
            // window.location.href = "quiz.html"; // Example of redirecting to another page
        }
    </script>
</body>
</html>