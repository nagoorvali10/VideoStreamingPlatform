<?php
// Use Environment Variables for Docker, fallback to localhost for XAMPP
$host = getenv('DB_HOST') ?: "localhost";
$user = getenv('DB_USER') ?: "root";
$pass = getenv('DB_PASS') ?: "05231A"; 
$dbname = getenv('DB_NAME') ?: "strimx_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>