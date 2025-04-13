<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['is_logged_in'] = true;

            // Set remember me cookie if checked
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $expires = time() + (86400 * 30); // 30 days

                // Store token in database
                $stmt = $pdo->prepare("UPDATE users SET remember_token = ?, token_expires = ? WHERE id = ?");
                $stmt->execute([$token, date('Y-m-d H:i:s', $expires), $user['id']]);

                // Set cookie
                setcookie('remember_token', $token, $expires, '/', '', true, true);
            }

            // Return success response
            echo json_encode([
                'success' => true,
                'message' => 'Login successful',
                'redirect' => 'dashboard.php'
            ]);
            exit;
        } else {
            throw new Exception('Invalid email or password');
        }
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
        exit;
    }
}

// Handle remember me cookie
if (!isset($_SESSION['is_logged_in']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];
    
    try {
        $stmt = $pdo->prepare("
            SELECT * FROM users 
            WHERE remember_token = ? 
            AND token_expires > NOW()
        ");
        $stmt->execute([$token]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['is_logged_in'] = true;

            // Redirect to dashboard
            header('Location: dashboard.php');
            exit;
        }
    } catch (Exception $e) {
        // Clear invalid cookie
        setcookie('remember_token', '', time() - 3600, '/');
    }
}

// If accessing directly without POST, redirect to home
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
?>
