const apiKey = "AIzaSyDpXsvDHxPmrSB_58vPvZI4-pWuRQN92To";

const form = document.getElementById("coverLetterForm");
const output = document.getElementById("coverLetterOutput");
const aiButton = document.getElementById("generateAI");
const saveButton = document.getElementById("saveCoverLetter");
const clearButton = document.getElementById("clearCoverLetter");
const downloadButton = document.getElementById("downloadPDF");

function templateCoverLetter(name, jobTitle, companyName, message, jobDescription) {
    let jdContent = jobDescription ? `Job Description Highlights: ${jobDescription}\n` : "";

    return `
Dear Hiring Manager at ${companyName},

I am excited to apply for the ${jobTitle} position at ${companyName}. I believe my skills and experiences make me a great fit.
${jdContent}
${message || "I look forward to contributing my skills and experience to your team."}

Best Regards,
${name}
    `;
}

function clearCoverLetter() {
    document.getElementById("name").value = "";
    document.getElementById("jobTitle").value = "";
    document.getElementById("companyName").value = "";
    document.getElementById("customMessage").value = "";
    document.getElementById("jobDescription").value = "";
    output.innerHTML = "";
}

function saveToLocalStorage() {
    const coverLetter = output.innerHTML;
    if (coverLetter.trim() !== "") {
        localStorage.setItem("savedCoverLetter", coverLetter);
        alert("✅ Cover Letter Saved Successfully!");
    } else {
        alert("❌ No Cover Letter to Save!");
    }
}

function loadFromLocalStorage() {
    const savedCoverLetter = localStorage.getItem("savedCoverLetter");
    if (savedCoverLetter) {
        output.innerHTML = savedCoverLetter;
    }
}

window.onload = loadFromLocalStorage;

form.addEventListener("submit", (e) => {
    e.preventDefault();
    const name = document.getElementById("name").value;
    const jobTitle = document.getElementById("jobTitle").value;
    const companyName = document.getElementById("companyName").value;
    const message = document.getElementById("customMessage").value;
    const jobDescription = document.getElementById("jobDescription").value;

    const coverLetter = templateCoverLetter(name, jobTitle, companyName, message, jobDescription);
    output.innerHTML = coverLetter.replace(/\n/g, "<br>");
});

saveButton.addEventListener("click", saveToLocalStorage);
clearButton.addEventListener("click", clearCoverLetter);

// AI-Generated Cover Letter
aiButton.addEventListener("click", async () => {
    const name = document.getElementById("name").value;
    const jobTitle = document.getElementById("jobTitle").value;
    const companyName = document.getElementById("companyName").value;
    const skills = document.getElementById("customMessage").value;

    const prompt = `Write a professional cover letter for a ${jobTitle} position at ${companyName}. Applicant's name is ${name}. Highlight the following skills: ${skills}.`;

    try {
        const response = await fetch("https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=" + apiKey, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                contents: [{ parts: [{ text: prompt }] }]
            })
        });

        const result = await response.json();

        if (result.candidates && result.candidates.length > 0) {
            const aiText = result.candidates[0].content.parts[0].text;
            const coverLetter = templateCoverLetter(name, jobTitle, companyName, aiText);
            output.innerHTML = coverLetter.replace(/\n/g, "<br>");
        } else {
            alert("❌ AI response is empty!");
        }
    } catch (error) {
        console.error("Error generating content:", error);
        alert("⚠️ AI generation failed. Check API Key!");
    }
});

// Download as PDF using jsPDF
async function downloadPDF() {
    const { jsPDF } = window.jspdf;

    const coverLetter = output.innerHTML;
    if (coverLetter.trim() === "") {
        alert("❌ No Cover Letter to Download!");
        return;
    }

    const pdf = new jsPDF();
    pdf.setFontSize(12);

    // Converting HTML to plain text for PDF
    const plainText = coverLetter
        .replace(/<br\s*\/?>/g, "\n")  // Convert <br> to newline
        .replace(/<\/?[^>]+(>|$)/g, ""); // Remove all HTML tags

    const lines = pdf.splitTextToSize(plainText, 180); // Wrap text
    pdf.text(lines, 10, 10);
    pdf.save("cover_letter.pdf");
}

downloadButton.addEventListener("click", downloadPDF);
