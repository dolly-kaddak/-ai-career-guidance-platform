<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            background-color: #1a202c;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #2d3748;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .header button {
            background: none;
            border: none;
            color: #a0aec0;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .header button:hover {
            color: #fff;
        }
        .score {
            text-align: center;
            margin-bottom: 20px;
        }
        .score .percentage {
            font-size: 2rem;
            font-weight: bold;
        }
        .progress-bar {
            width: 100%;
            background-color: #4a5568;
            border-radius: 9999px;
            height: 10px;
            margin-top: 10px;
        }
        .progress-bar-inner {
            background-color: #48bb78;
            height: 100%;
            border-radius: 9999px;
            width: 80%;
        }
        .tip {
            background-color: #4a5568;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .tip h2 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .tip p {
            color: #a0aec0;
        }
        .question {
            background-color: #4a5568;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .question .question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .question .question-header h3 {
            font-size: 1.125rem;
            font-weight: 600;
        }
        .question .question-header i {
            font-size: 1.2rem;
        }
        .question .answer {
            color: #a0aec0;
            margin-bottom: 10px;
        }
        .question .explanation {
            background-color: #2d3748;
            padding: 10px;
            border-radius: 8px;
        }
        .question .explanation p {
            color: #a0aec0;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Quiz Results</h1>
            <button onclick="closeWindow()"><i class="fas fa-times"></i></button>
        </div>
        <div class="score">
            <div class="percentage">80.0%</div>
            <div class="progress-bar">
                <div class="progress-bar-inner"></div>
            </div>
        </div>
        <div class="tip">
            <h2>Improvement Tip:</h2>
            <p>Focus on learning the broader React component lifecycle and how <code>useEffect</code> integrates with it, going beyond just asynchronous operations. Practice using <code>useEffect</code> in various lifecycle scenarios, including data fetching and cleanup.</p>
        </div>
        <div class="question">
            <div class="question-header">
                <h3>Which of the following is NOT a core feature of React?</h3>
                <i class="fas fa-check-circle" style="color: #48bb78;"></i>
            </div>
            <p class="answer">Your answer: Two-way data binding</p>
            <div class="explanation">
                <p>Explanation:</p>
                <p>React utilizes a unidirectional data flow, not two-way data binding.</p>
            </div>
        </div>
        <div class="question">
            <div class="question-header">
                <h3>In Tailwind CSS, what is the purpose of the <code>@apply</code> directive?</h3>
                <i class="fas fa-check-circle" style="color: #48bb78;"></i>
            </div>
            <p class="answer">Your answer: To apply pre-defined utility classes</p>
            <div class="explanation">
                <p>Explanation:</p>
                <p><code>@apply</code> directly inlines the styles of a pre-defined utility class into the current styles.</p>
            </div>
        </div>
        <div class="question">
            <div class="question-header">
                <h3>What is the primary purpose of <code>useEffect</code> hook in React?</h3>
                <i class="fas fa-times-circle" style="color: #f56565;"></i>
            </div>
            <p class="answer">Your answer: To handle asynchronous operations</p>
            <div class="explanation">
                <p>Explanation:</p>
                <p><code>useEffect</code> allows performing side effects in functional components, such as data fetching.</p>
            </div>
        </div>
    </div>
    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>
</html>