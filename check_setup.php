<?php
echo "========================================\n";
echo "Wedding Digital Platform - Setup Checker\n";
echo "========================================\n\n";

$checks = [
    'success' => 0,
    'warnings' => 0,
    'errors' => 0
];

// Function to print status
function printStatus($message, $status, &$checks) {
    $status_text = '';
    $color_code = '';
    
    switch($status) {
        case 'SUCCESS':
            $status_text = '[✓] SUCCESS';
            $color_code = '32'; // Green
            $checks['success']++;
            break;
        case 'WARNING':
            $status_text = '[!] WARNING';
            $color_code = '33'; // Yellow
            $checks['warnings']++;
            break;
        case 'ERROR':
            $status_text = '[✗] ERROR';
            $color_code = '31'; // Red
            $checks['errors']++;
            break;
    }
    
    echo $message . " ... \033[" . $color_code . "m" . $status_text . "\033[0m\n";
}

// 1. Check PHP Version
echo "Checking PHP Version...\n";
if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
    printStatus("PHP Version: " . PHP_VERSION, 'SUCCESS', $checks);
} else {
    printStatus("PHP Version: " . PHP_VERSION . " (Required: >= 7.4.0)", 'ERROR', $checks);
}

// 2. Check Required PHP Extensions
echo "\nChecking Required PHP Extensions...\n";
$required_extensions = ['mysqli', 'json', 'session', 'fileinfo'];
foreach ($required_extensions as $extension) {
    if (extension_loaded($extension)) {
        printStatus("Extension: " . $extension, 'SUCCESS', $checks);
    } else {
        printStatus("Extension: " . $extension, 'ERROR', $checks);
    }
}

// 3. Check Database Connection
echo "\nChecking Database Connection...\n";
require_once 'db.php';
try {
    if ($conn && $conn->ping()) {
        printStatus("Database Connection", 'SUCCESS', $checks);
        
        // Check if tables exist
        $required_tables = ['undangan', 'rsvp'];
        foreach ($required_tables as $table) {
            $result = $conn->query("SHOW TABLES LIKE '$table'");
            if ($result->num_rows > 0) {
                printStatus("Table: " . $table, 'SUCCESS', $checks);
            } else {
                printStatus("Table: " . $table . " (not found)", 'ERROR', $checks);
            }
        }
    }
} catch (Exception $e) {
    printStatus("Database Connection: " . $e->getMessage(), 'ERROR', $checks);
}

// 4. Check File Permissions
echo "\nChecking File Permissions...\n";
$files_to_check = [
    'db.php',
    'index.php',
    'header.php',
    'footer.php',
    'create_invitation.php',
    'invitation.php',
    'process_rsvp.php',
    'admin_login.php',
    'admin_dashboard.php',
    'view_rsvp.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        if (is_readable($file)) {
            printStatus("File readable: " . $file, 'SUCCESS', $checks);
        } else {
            printStatus("File not readable: " . $file, 'ERROR', $checks);
        }
    } else {
        printStatus("File missing: " . $file, 'ERROR', $checks);
    }
}

// 5. Check write permissions for potential upload directories
echo "\nChecking Upload Directory Permissions...\n";
$upload_dir = 'uploads';
if (!file_exists($upload_dir)) {
    if (mkdir($upload_dir, 0755)) {
        printStatus("Created upload directory", 'SUCCESS', $checks);
    } else {
        printStatus("Could not create upload directory", 'ERROR', $checks);
    }
} else {
    if (is_writable($upload_dir)) {
        printStatus("Upload directory is writable", 'SUCCESS', $checks);
    } else {
        printStatus("Upload directory is not writable", 'ERROR', $checks);
    }
}

// Summary
echo "\n========================================\n";
echo "Setup Check Summary:\n";
echo "----------------------------------------\n";
echo "Successes: " . $checks['success'] . "\n";
echo "Warnings: " . $checks['warnings'] . "\n";
echo "Errors: " . $checks['errors'] . "\n";
echo "========================================\n\n";

if ($checks['errors'] > 0) {
    echo "\033[31mThere are some issues that need to be resolved before running the application.\033[0m\n";
} elseif ($checks['warnings'] > 0) {
    echo "\033[33mThe application should work but there are some warnings to consider.\033[0m\n";
} else {
    echo "\033[32mAll checks passed! The application is ready to run.\033[0m\n";
}

// Additional Information
echo "\nUseful Information:";
echo "\n----------------------------------------\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Current Directory: " . getcwd() . "\n";
echo "----------------------------------------\n";
?>
