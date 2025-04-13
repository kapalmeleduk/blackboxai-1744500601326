<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear remember me cookie if exists
if (isset($_COOKIE['remember_token'])) {
    require_once 'db.php';
    
    try {
        // Clear token from database
        $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL, token_expires = NULL WHERE remember_token = ?");
        $stmt->execute([$_COOKIE['remember_token']]);
    } catch (Exception $e) {
        // Log error if needed
    }
    
    // Delete the cookie
    setcookie('remember_token', '', time() - 3600, '/');
}

// Redirect to home page
header('Location: index.php');
exit;
?>
