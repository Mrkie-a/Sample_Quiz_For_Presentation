<?php
// Show errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "127.0.0.1"; // Use 127.0.0.1 instead of localhost
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "secure_quiz";    // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>