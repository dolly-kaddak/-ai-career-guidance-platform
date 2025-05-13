const paths = {
    ai_engineer: {
        title: "🤖 AI Engineer",
        skills: "Python, Machine Learning, Deep Learning, NLP, TensorFlow",
        certifications: "AI Certification by Coursera, TensorFlow Developer",
        courses: "Machine Learning by Andrew Ng, Deep Learning Specialization",
        projects: "AI Chatbot, Face Recognition, Sentiment Analysis",
        timeline: "6-12 months"
    },
    data_scientist: {
        title: "📊 Data Scientist",
        skills: "Python, SQL, Data Visualization, Statistics, Big Data",
        certifications: "Data Science Professional Certificate",
        courses: "Data Science with Python, Statistics for Data Science",
        projects: "Data Analysis, Predictive Modeling, Dashboard Creation",
        timeline: "6-12 months"
    },
    web_developer: {
        title: "🌐 Web Developer",
        skills: "HTML, CSS, JavaScript, React, Node.js",
        certifications: "Full-Stack Web Development Certification",
        courses: "Web Development Bootcamp, JavaScript Mastery",
        projects: "E-commerce Website, Portfolio, Blog Website",
        timeline: "3-6 months"
    },
    cyber_security: {
        title: "🔐 Cyber Security Analyst",
        skills: "Network Security, Ethical Hacking, Penetration Testing",
        certifications: "CEH, CompTIA Security+",
        courses: "Cyber Security Fundamentals, Ethical Hacking",
        projects: "Network Security Audit, Threat Detection, Security Assessment",
        timeline: "8-12 months"
    },
    mobile_developer: {
        title: "📱 Mobile App Developer",
        skills: "Java, Kotlin, Swift, Flutter, React Native",
        certifications: "Mobile App Development Certification",
        courses: "Android & iOS Development, Flutter for Mobile",
        projects: "E-commerce App, Social Media App, Fitness App",
        timeline: "6-9 months"
    },
    game_developer: {
        title: "🎮 Game Developer",
        skills: "C#, Unity, Game Physics, Unreal Engine",
        certifications: "Game Development Certification",
        courses: "Unity Development, Game Design Fundamentals",
        projects: "2D/3D Game Development, VR Games, Multiplayer Games",
        timeline: "9-12 months"
    },
    blockchain_dev: {
        title: "⛓️ Blockchain Developer",
        skills: "Solidity, Smart Contracts, Ethereum, Web3",
        certifications: "Blockchain Development Certification",
        courses: "Blockchain Basics, Smart Contract Development",
        projects: "Decentralized App, Crypto Wallet, NFT Marketplace",
        timeline: "8-12 months"
    },
    digital_marketer: {
        title: "📢 Digital Marketer",
        skills: "SEO, SEM, Content Marketing, Social Media Marketing",
        certifications: "Google Digital Marketing, HubSpot Certification",
        courses: "SEO Basics, Social Media Marketing",
        projects: "Marketing Campaigns, SEO Optimization, Branding",
        timeline: "3-6 months"
    },
    devops_engineer: {
        title: "⚙️ DevOps Engineer",
        skills: "Docker, Kubernetes, CI/CD, Cloud Infrastructure",
        certifications: "AWS Certified DevOps, Kubernetes Certification",
        courses: "Docker & Kubernetes Masterclass, Cloud DevOps",
        projects: "CI/CD Pipelines, Cloud Deployment, Server Automation",
        timeline: "8-12 months"
    },
    cloud_architect: {
        title: "☁️ Cloud Architect",
        skills: "AWS, Azure, Cloud Security, Virtualization",
        certifications: "AWS Certified Architect, Azure Certification",
        courses: "Cloud Fundamentals, AWS Solutions Architect",
        projects: "Cloud Migration, Infrastructure Setup, Cloud Security",
        timeline: "9-12 months"
    }
};

function generatePath() {
    const career = document.getElementById("career").value;
    const roadmapContent = document.getElementById("roadmap-content");
    const path = paths[career];

    roadmapContent.innerHTML = `
        <div class="roadmap-step">
            <h3>${path.title}</h3>
            <p><strong>🛠️ Skills:</strong> ${path.skills}</p>
            <p><strong>📜 Certifications:</strong> ${path.certifications}</p>
            <p><strong>📚 Courses:</strong> ${path.courses}</p>
            <p><strong>💡 Projects:</strong> ${path.projects}</p>
            <p><strong>⏳ Timeline:</strong> ${path.timeline}</p>
        </div>
    `;

    document.getElementById("roadmap-container").classList.remove("hidden");
    document.getElementById("save-btn").classList.remove("hidden");
}

function savePath() {
    const career = document.getElementById("career").value;
    const path = paths[career];

    const data = {
        title: path.title,
        steps: JSON.stringify(path)
    };

    fetch('save_roadmap.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert('✅ Learning path saved successfully!');
        } else {
            alert('❌ Error saving path. Please try again!');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('❌ Error saving path. Please check your connection!');
    });
}
