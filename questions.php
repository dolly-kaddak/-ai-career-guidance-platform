<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Interview</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #000; /* Plain black background */
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #00ffea;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #ddd;
        }

        .question-box {
            background: rgba(25, 25, 25, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
            margin-top: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s;
        }

        .question-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 255, 255, 1);
        }

        .question-box h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffeb3b;
        }

        .question-box label {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            transition: background 0.3s;
        }

        .question-box label:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background: linear-gradient(45deg, #00ffea, #ff00ff);
            color: #000;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px #00ffea;
        }

        .next-button {
            background: linear-gradient(45deg, #ffeb3b, #ff9800);
        }

        .submit-button {
            background: linear-gradient(45deg, #00ff00, #ffeb3b);
            display: none;
        }

        .explanation {
            display: none;
            margin-top: 10px;
            font-style: italic;
            color: #ffeb3b;
        }

        .hidden {
            display: none;
        }

        .dashboard-btn {
            background: linear-gradient(45deg, #00ff00, #ffeb3b);
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1><i class="fas fa-robot"></i> Mock Interview</h1>
        <p>Test your knowledge with AI-powered industry-specific questions</p>

        <div class="question-box" id="question-box">
            <h2 id="question-number">Question</h2>
            <p id="question-text"></p>
            <label><input type="radio" name="answer" value="A"> <span id="option-a"></span></label>
            <label><input type="radio" name="answer" value="B"> <span id="option-b"></span></label>
            <label><input type="radio" name="answer" value="C"> <span id="option-c"></span></label>
            <label><input type="radio" name="answer" value="D"> <span id="option-d"></span></label>

            <button id="show-explanation"><i class="fas fa-info-circle"></i> Show Explanation</button>
            <button class="next-button" id="next-question">Next Question</button>
            <button class="submit-button" id="submit-quiz">Submit</button>

            <p class="explanation" id="explanation-text"></p>
        </div>

        <div class="hidden" id="quiz-result">
            <h2>🎉 Quiz Completed!</h2>
            <p id="score-text"></p>
            <button class="dashboard-btn" onclick="window.location.href='graph.php'">Return to Dashboard</button>
            <button class="dashboard-btn" onclick="window.location.href='startq.php'">Restart Quiz</button>
        </div>
    </div>

    <script>
        let questions = [];
        let currentQuestionIndex = 0;
        let score = 0;
        let userAnswers = [];

        async function fetchQuestions() {
            try {
                let response = await fetch("get_questions.php");
                questions = await response.json();
                displayQuestion();
            } catch (error) {
                console.error("Error fetching questions:", error);
            }
        }

        function displayQuestion() {
            if (currentQuestionIndex >= questions.length) {
                return showResults();
            }

            let question = questions[currentQuestionIndex];
            document.getElementById("question-number").innerText = `Question ${currentQuestionIndex + 1} of ${questions.length}`;
            document.getElementById("question-text").innerText = question.question_text;
            document.getElementById("option-a").innerText = question.option_a;
            document.getElementById("option-b").innerText = question.option_b;
            document.getElementById("option-c").innerText = question.option_c;
            document.getElementById("option-d").innerText = question.option_d;
            document.getElementById("explanation-text").innerText = `Correct Answer: ${question.correct_option} - ${question.explanation}`;
            document.getElementById("explanation-text").style.display = "none";

            document.getElementById("next-question").style.display = currentQuestionIndex === questions.length - 1 ? "none" : "inline-block";
            document.getElementById("submit-quiz").style.display = currentQuestionIndex === questions.length - 1 ? "inline-block" : "none";
        }

        document.getElementById("next-question").addEventListener("click", () => {
            let selected = document.querySelector("input[name='answer']:checked");
            if (selected) {
                if (selected.value === questions[currentQuestionIndex].correct_option) {
                    score++;
                }
                userAnswers.push({
                    question_id: questions[currentQuestionIndex].id,
                    selected_option: selected.value
                });
            }
            currentQuestionIndex++;
            displayQuestion();
        });

        document.getElementById("submit-quiz").addEventListener("click", () => {
            fetch("submit_quiz.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ user_id: 1, answers: userAnswers, score: score })
            }).then(response => response.json()).then(data => {
                console.log("Saved Successfully:", data);
            }).catch(error => console.error("Error saving data:", error));
            showResults();
        });

        function showResults() {
            document.querySelector(".question-box").classList.add("hidden");
            document.getElementById("quiz-result").classList.remove("hidden");
            document.getElementById("score-text").innerText = `Your Score: ${score} / ${questions.length}`;
        }

        document.getElementById("show-explanation").addEventListener("click", () => {
            document.getElementById("explanation-text").style.display = "block";
        });

        fetchQuestions();
    </script>
</body>

</html>
