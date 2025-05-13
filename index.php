<!DOCTYPE html>
<html>
<head>
    <title>🚀 AI Career Learning Path Generator</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Background Animation -->
    <div class="background"></div>

    <!-- Container for Main Content -->
    <div class="container">
        <h1>🚀 AI Career Learning Path Generator</h1>
        
        <!-- Career Path Selection -->
        <div class="form-container">
            <label for="career">🎯 Select Your Desired Career Path:</label>
            <select id="career">
                <option value="ai_engineer">🤖 AI Engineer</option>
                <option value="data_scientist">📊 Data Scientist</option>
                <option value="web_developer">🌐 Web Developer</option>
                <option value="cyber_security">🔐 Cyber Security</option>
                <option value="mobile_developer">📱 Mobile App Developer</option>
                <option value="game_developer">🎮 Game Developer</option>
                <option value="blockchain_dev">⛓️ Blockchain Developer</option>
                <option value="digital_marketer">📢 Digital Marketer</option>
                <option value="devops_engineer">⚙️ DevOps Engineer</option>
                <option value="cloud_architect">☁️ Cloud Architect</option>
            </select>
            <button onclick="generatePath()">🚀 Generate Path</button>
        </div>

        <!-- Dynamic Learning Path Display -->
        <div id="roadmap-container" class="hidden">
            <h2>🛠️ Your AI-Powered Learning Path</h2>
            <div id="roadmap-content" class="roadmap-box"></div>
        </div>

        <!-- Save Button -->
        <button id="save-btn" class="hidden" onclick="savePath()">💾 Save Path</button>
    </div>

    <!-- Chatbot Box -->
    <div class="chatbox">
        <p>🤖 Got any questions? Chat with AI!</p>
        <a href="/final1/chat.html" target="_blank" class="chatbot-btn">💬 Open Chat</a>



    </div>

    <script src="js/script.js"></script>
</body>
</html>