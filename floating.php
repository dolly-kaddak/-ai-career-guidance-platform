<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Interview Preparation</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        /* Floating Particles */
        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background: cyan;
            border-radius: 50%;
            box-shadow: 0 0 10px cyan;
            opacity: 0.7;
            animation: float 6s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translateY(0); opacity: 0.8; }
            50% { transform: translateY(-20px); opacity: 0.5; }
            100% { transform: translateY(0); opacity: 0.8; }
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            background-color: #111;
        }
        .chart-container {
            background-color: #333;
            padding: 16px;
            border-radius: 8px;
        }
        
    </style>
</head>
<body>
    <header>
        <div class="logo">SENS <span style="color: #1E90FF;">AI</span></div>
    </header>
    
    <main>
        <h1>Interview Preparation</h1>
        <div class="chart-container">
            <h2>Performance Trend</h2>
            <canvas id="performanceChart"></canvas>
        </div>
    </main>
    
    <script>
        // Animated Performance Chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Score',
                    data: [50, 75, 60, 80, 55],
                    borderColor: 'rgba(0, 255, 255, 1)',
                    backgroundColor: 'rgba(0, 255, 255, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                },
                scales: {
                    x: { ticks: { color: 'white' } },
                    y: { ticks: { color: 'white' } }
                }
            }
        });

        // Generate Floating Particles
        function createParticle() {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            document.body.appendChild(particle);
            
            const size = Math.random() * 6 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            particle.style.left = `${Math.random() * 100}vw`;
            particle.style.top = `${Math.random() * 100}vh`;
            particle.style.animationDuration = `${Math.random() * 6 + 4}s`;
            
            setTimeout(() => particle.remove(), 8000);
        }
        
        setInterval(createParticle, 500);
    </script>
</body>
</html>