<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Preparation</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1E1E2E, #0D0D19);
            color: white;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background: rgba(17, 17, 34, 0.8);
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(138, 43, 226, 0.5);
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            color: #8A2BE2;
        }

        header .nav {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Updated Buttons */
        header .nav button {
            background: linear-gradient(135deg, #8A2BE2, #00FFFF);
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(138, 43, 226, 0.5);
        }

        header .nav button:hover {
            background: linear-gradient(135deg, #00FFFF, #8A2BE2);
            box-shadow: 0 6px 20px rgba(0, 255, 255, 0.7);
            transform: translateY(-2px);
        }

        main {
            padding: 32px;
            max-width: 900px;
            margin: auto;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(0, 255, 255, 0.3);
            transition: 0.3s;
        }

        .stat-card:hover {
            box-shadow: 0px 4px 20px rgba(0, 255, 255, 0.7);
        }

        .stat-card h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .stat-card p {
            font-size: 24px;
            font-weight: bold;
            margin: 8px 0;
            color: #00FFFF;
        }

        .chart-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 24px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 4px 15px rgba(138, 43, 226, 0.5);
        }

        img {
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">AI Career<span style="color: #00FFFF;"> Hub</span></div>
        <div class="nav">
            <button onclick="window.location.href='startq.php'">Start Quiz</button>
            <button onclick="window.location.href='interviewpage.php'">Recent Quiz</button>
            <img alt="User profile" height="40" src="https://www.w3schools.com/howto/img_avatar.png" width="40">
        </div>
    </header>
    <main>
        <h1>Interview Preparation</h1>
        <div class="stats">
            <div class="stat-card">
                <h2>Average Score</h2>
                <p id="avg-score">Loading...</p>
                <small>Across all assessments</small>
            </div>
            <div class="stat-card">
                <h2>Questions Practiced</h2>
                <p id="total-questions">Loading...</p>
                <small>Total questions</small>
            </div>
            <div class="stat-card">
                <h2>Latest Score</h2>
                <p id="latest-score">Loading...</p>
                <small>Most recent quiz</small>
            </div>
        </div>
        <div class="chart-container">
            <h2>Performance Trend</h2>
            <p>Your quiz scores over time</p>
            <canvas id="performanceChart" width="800" height="400"></canvas>
        </div>
    </main>

    <script>
        async function fetchQuizData() {
            try {
                const response = await fetch('fetch_quiz_data.php');
                const data = await response.json();

                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Update Stats
                document.getElementById('avg-score').textContent = data.stats.avg_score + '%';
                document.getElementById('total-questions').textContent = data.stats.total_questions_practiced;
                document.getElementById('latest-score').textContent = data.stats.latest_score + '%';

                // Update Chart
                const labels = data.performance.map(entry => entry.quiz_date);
                const scores = data.performance.map(entry => entry.score);

                const ctx = document.getElementById('performanceChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Score',
                            data: scores,
                            borderColor: '#8A2BE2',
                            backgroundColor: 'rgba(138, 43, 226, 0.2)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                ticks: {
                                    color: 'white'
                                }
                            },
                            y: {
                                ticks: {
                                    color: 'white'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

            } catch (error) {
                console.error("Error fetching quiz data:", error);
            }
        }

        fetchQuizData();
    </script>
</body>

</html>
