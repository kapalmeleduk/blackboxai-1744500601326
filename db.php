<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'wedding_invitation';

// Create database connection
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8mb4
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    // Log the error (in a production environment, you'd want to log this to a file)
    error_log("Database Connection Error: " . $e->getMessage());
    
    // Show user-friendly message
    die("Maaf, terjadi kesalahan dalam koneksi database. Silakan coba beberapa saat lagi.");
}
?>
