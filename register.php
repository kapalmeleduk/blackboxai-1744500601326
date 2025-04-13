<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    try {
        // Validate input
        if (empty($name) || empty($email) || empty($password)) {
            throw new Exception('All fields are required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email format');
        }

        if (strlen($password) < 8) {
            throw new Exception('Password must be at least 8 characters long');
        }

        if ($password !== $confirm_password) {
            throw new Exception('Passwords do not match');
        }

        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            throw new Exception('Email already registered');
        }

        // Create user
        if (createUser($pdo, $name, $email, $password)) {
            // Get user data for session
            $user = getUserByEmail($pdo, $email);
            
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['is_logged_in'] = true;

            // Return success response
            echo json_encode([
                'success' => true,
                'message' => 'Registration successful',
                'redirect' => 'dashboard.php'
            ]);
            exit;
        } else {
            throw new Exception('Registration failed');
        }
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Digital Wedding Invitation</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-pink-50 to-white min-h-screen">
    <div class="max-w-md mx-auto px-4 py-12">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <a href="index.php" class="inline-block mb-4">
                <i class="fas fa-heart text-4xl text-pink-500"></i>
            </a>
            <h1 class="text-3xl font-playfair font-bold mb-2">Create Account</h1>
            <p class="text-gray-600">Join us to create beautiful digital invitations</p>
        </div>

        <!-- Registration Form -->
        <form id="registerForm" class="bg-white rounded-2xl shadow-xl p-8 space-y-6">
            <!-- Name Field -->
            <div class="form-group">
                <input type="text" 
                       name="name" 
                       class="form-input" 
                       placeholder=" " 
                       required>
                <label class="form-label">Full Name</label>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <input type="email" 
                       name="email" 
                       class="form-input" 
                       placeholder=" " 
                       required>
                <label class="form-label">Email Address</label>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <input type="password" 
                       name="password" 
                       class="form-input" 
                       placeholder=" " 
                       required>
                <label class="form-label">Password</label>
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <input type="password" 
                       name="confirm_password" 
                       class="form-input" 
                       placeholder=" " 
                       required>
                <label class="form-label">Confirm Password</label>
            </div>

            <!-- Terms Checkbox -->
            <div class="flex items-start">
                <label class="form-checkbox">
                    <input type="checkbox" name="terms" required>
                    <span class="text-sm text-gray-600">
                        I agree to the <a href="#" class="text-pink-500 hover:text-pink-600">Terms of Service</a> and 
                        <a href="#" class="text-pink-500 hover:text-pink-600">Privacy Policy</a>
                    </span>
                </label>
            </div>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden bg-red-50 text-red-500 p-4 rounded-lg text-sm"></div>

            <!-- Submit Button -->
            <button type="submit" class="form-submit w-full">
                <i class="fas fa-user-plus mr-2"></i>Create Account
            </button>

            <!-- Login Link -->
            <div class="text-center text-sm text-gray-600">
                Already have an account? 
                <a href="#" onclick="openLoginModal()" class="text-pink-500 hover:text-pink-600">Login here</a>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const errorDiv = document.getElementById('errorMessage');
        
        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else {
                errorDiv.textContent = data.message;
                errorDiv.classList.remove('hidden');
            }
        })
        .catch(error => {
            errorDiv.textContent = 'An error occurred. Please try again.';
            errorDiv.classList.remove('hidden');
        });
    });
    </script>
</body>
</html>
