<?php
session_start(); // Start session for actual user ID

// Database connection 
$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "ai_career_hub"; 

$conn = new mysqli($host, $user, $pass, $dbname);

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Set UTF-8 encoding
$conn->set_charset("utf8");

// Simulated session user ID (replace with actual session variable)
$user_id = $_SESSION['create_id'];

// *Step 1: Fetch the specialization of the logged-in user*
$query = "SELECT specialization FROM profiles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_specialization);
$stmt->fetch();
$stmt->close();

//Retrieves the specialization of the currently logged-in user (from the profiles table).

//Uses a prepared statement to avoid SQL injection.

// *If no specialization found, return an error*
if (!$user_specialization) {
    echo json_encode(["error" => "Specialization not found for the user."]);
    exit;
}

// *Step 2: Fetch salary details of the logged-in user's specialization (for cards)*
$query = "SELECT specialization, min_salary, median_salary, max_salary, market_outlook,industry_growth,demand_level,top_skills
          FROM Specializations WHERE specialization = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_specialization);
$stmt->execute();
$user_salary_data = $stmt->get_result()->fetch_assoc();
$stmt->close();

// *Step 3: Fetch 4 random specializations (excluding the user's specialization)*
$query = "SELECT specialization, min_salary, median_salary, max_salary 
          FROM Specializations WHERE specialization != ? 
          ORDER BY RAND() LIMIT 4";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_specialization);
$stmt->execute();
$result = $stmt->get_result();

$graph_data = [$user_salary_data]; // Add user's specialization first
while ($row = $result->fetch_assoc()) {
    $graph_data[] = $row;
}
$stmt->close();
$conn->close();

// *Step 4: Return JSON response with user-specific card values & graph data*
$response = [
    "user_category" => $user_salary_data, // Only for card values
    "graph_data" => $graph_data // Includes user specialization + 4 random specializations
];

echo json_encode($response);
?>