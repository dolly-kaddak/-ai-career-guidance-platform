<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Interview - AI Career Guidance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d0d0d, #1a1a2e);
            color: #fff;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Animated Background Orbs */
        #background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(0, 255, 255, 0.4), rgba(0, 255, 255, 0));
            border-radius: 50%;
            animation: moveOrb 12s infinite alternate;
        }

        @keyframes moveOrb {
            0% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-20vh) translateX(20vw);
            }
            100% {
                transform: translateY(20vh) translateX(-20vw);
            }
        }

        /* Container & Card Design */
        .container {
            width: 90%;
            max-width: 600px;
            background: rgba(26, 26, 26, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 255, 255, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Back Link */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bbb;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .back-link i {
            margin-right: 8px;
        }

        .back-link:hover {
            color: cyan;
            transform: translateX(-5px);
        }

        h1 {
            font-size: 28px;
            background: linear-gradient(90deg, cyan, #00ffcc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        p {
            color: #ccc;
            margin-bottom: 20px;
            font-size: 16px;
        }

        /* Content Box */
        .content {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 255, 255, 0.1);
            transition: 0.3s ease-in-out;
        }

        .content:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 255, 255, 0.3);
        }

        .content h2 {
            font-size: 20px;
            color: cyan;
            margin-bottom: 12px;
        }

        /* Button Design */
        .start-btn {
            background: linear-gradient(135deg, #00ffff, #00ffcc, #0077ff);
            color: #0d0d0d;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .start-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.1);
            transition: width 0.4s ease, height 0.4s ease, top 0.4s ease, left 0.4s ease;
            border-radius: 50%;
            z-index: 0;
            transform: translate(-50%, -50%);
        }

        .start-btn:hover::before {
            width: 0;
            height: 0;
        }

        .start-btn:hover {
            background: white;
            color: black;
            box-shadow: 0 0 15px cyan;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            .start-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Background Animation -->
    <div id="background-animation"></div>

    <!-- Container -->
    <div class="container">
        <a href="graph.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Interview Preparation
        </a>
        <h1>Mock Interview</h1>
        <p>Challenge yourself with AI-powered interview questions that match your career path.</p>

        <div class="content">
            <h2>Are you ready to level up?</h2>
            <p>Answer 10 carefully designed questions and evaluate your strengths.</p>
            <button class="start-btn" onclick="window.location.href='questions.php'">🚀 Start Quiz</button>
        </div>
    </div>

    <!-- Orb Animation Script -->
    <script>
        const numOrbs = 8;
        for (let i = 0; i < numOrbs; i++) {
            const orb = document.createElement('div');
            orb.className = 'orb';
            orb.style.left = `${Math.random() * 100}vw`;
            orb.style.top = `${Math.random() * 100}vh`;
            orb.style.animationDuration = `${Math.random() * 8 + 6}s`;
            document.getElementById('background-animation').appendChild(orb);
        }
    </script>

</body>

</html>
