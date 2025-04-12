<?php
session_start();

// Function to check if a step is complete
function isStepComplete($step) {
    return isset($_SESSION['installation_steps']) && in_array($step, $_SESSION['installation_steps']);
}

// Function to mark a step as complete
function markStepComplete($step) {
    if (!isset($_SESSION['installation_steps'])) {
        $_SESSION['installation_steps'] = array();
    }
    if (!in_array($step, $_SESSION['installation_steps'])) {
        $_SESSION['installation_steps'][] = $step;
    }
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['step']) && $_POST['step'] === 'database') {
        $db_host = $_POST['db_host'];
        $db_user = $_POST['db_user'];
        $db_pass = $_POST['db_pass'];
        $db_name = $_POST['db_name'];

        // Try to connect and create database
        try {
            $conn = new mysqli($db_host, $db_user, $db_pass);
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            // Create database if it doesn't exist
            $conn->query("CREATE DATABASE IF NOT EXISTS $db_name");
            $conn->select_db($db_name);
            $conn->set_charset("utf8mb4");

            // Read and execute SQL file
            $sql = file_get_contents('schema.sql');
            if ($sql === false) {
                throw new Exception("Error reading schema.sql file");
            }

            // Split SQL into individual queries
            $queries = array_filter(array_map('trim', explode(';', $sql)), 'strlen');
            
            // Execute each query
            foreach ($queries as $query) {
                if (!empty($query)) {
                    if (!$conn->query($query)) {
                        throw new Exception("Error executing query: " . $conn->error);
                    }
                }
            }

            // Create db.php file
            $db_config = "<?php\n";
            $db_config .= "\$db_host = '$db_host';\n";
            $db_config .= "\$db_user = '$db_user';\n";
            $db_config .= "\$db_pass = '$db_pass';\n";
            $db_config .= "\$db_name = '$db_name';\n\n";
            $db_config .= "try {\n";
            $db_config .= "    \$conn = new mysqli(\$db_host, \$db_user, \$db_pass, \$db_name);\n";
            $db_config .= "    if (\$conn->connect_error) {\n";
            $db_config .= "        throw new Exception(\"Connection failed: \" . \$conn->connect_error);\n";
            $db_config .= "    }\n";
            $db_config .= "    \$conn->set_charset(\"utf8mb4\");\n";
            $db_config .= "} catch (Exception \$e) {\n";
            $db_config .= "    error_log(\"Database Connection Error: \" . \$e->getMessage());\n";
            $db_config .= "    die(\"Maaf, terjadi kesalahan dalam koneksi database. Silakan coba beberapa saat lagi.\");\n";
            $db_config .= "}\n";

            if (file_put_contents('db.php', $db_config) === false) {
                throw new Exception("Error creating db.php file");
            }

            markStepComplete('database');
            $_SESSION['success'] = "Database berhasil dikonfigurasi!";
            
            // Close the connection
            $conn->close();
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalasi - Platform Undangan Pernikahan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💑</text></svg>">
</head>
<body class="bg-gray-50 font-montserrat">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 font-playfair mb-2">
                    Instalasi Platform Undangan Digital
                </h1>
                <p class="text-gray-600">
                    Ikuti langkah-langkah berikut untuk menginstal platform
                </p>
            </div>

            <!-- Messages -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo $_SESSION['success']; ?></span>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <!-- Installation Steps -->
            <div class="bg-white shadow rounded-lg">
                <!-- Step 1: System Requirements -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-green-100 text-green-500 flex items-center justify-center mr-3">
                            <i class="fas fa-check"></i>
                        </span>
                        Cek Sistem
                    </h2>
                    <div class="space-y-2">
                        <?php
                        $requirements = [
                            'PHP Version >= 7.4' => version_compare(PHP_VERSION, '7.4.0', '>='),
                            'MySQL Support' => extension_loaded('mysqli'),
                            'JSON Support' => extension_loaded('json'),
                            'Session Support' => extension_loaded('session'),
                            'FileInfo Support' => extension_loaded('fileinfo'),
                            'Schema File' => file_exists('schema.sql')
                        ];

                        foreach ($requirements as $requirement => $satisfied): ?>
                            <div class="flex items-center">
                                <?php if ($satisfied): ?>
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                <?php else: ?>
                                    <i class="fas fa-times text-red-500 mr-2"></i>
                                <?php endif; ?>
                                <span><?php echo $requirement; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Step 2: Database Configuration -->
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <span class="w-8 h-8 rounded-full bg-<?php echo isStepComplete('database') ? 'green' : 'blue'; ?>-100 text-<?php echo isStepComplete('database') ? 'green' : 'blue'; ?>-500 flex items-center justify-center mr-3">
                            <?php if (isStepComplete('database')): ?>
                                <i class="fas fa-check"></i>
                            <?php else: ?>
                                2
                            <?php endif; ?>
                        </span>
                        Konfigurasi Database
                    </h2>

                    <?php if (!isStepComplete('database')): ?>
                        <form method="POST" class="space-y-4">
                            <input type="hidden" name="step" value="database">
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Database Host
                                </label>
                                <input type="text" 
                                       name="db_host" 
                                       value="localhost" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Database Username
                                </label>
                                <input type="text" 
                                       name="db_user" 
                                       value="root" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Database Password
                                </label>
                                <input type="password" 
                                       name="db_pass" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Database Name
                                </label>
                                <input type="text" 
                                       name="db_name" 
                                       value="wedding_invitation" 
                                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <button type="submit" 
                                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                                Konfigurasi Database
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="text-green-600">
                            <i class="fas fa-check-circle mr-2"></i>
                            Database telah berhasil dikonfigurasi
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Final Step -->
                <?php if (isStepComplete('database')): ?>
                    <div class="p-6 bg-green-50 rounded-b-lg">
                        <h2 class="text-xl font-semibold text-green-800 mb-4">
                            <i class="fas fa-check-circle mr-2"></i>
                            Instalasi Selesai!
                        </h2>
                        <p class="text-green-700 mb-4">
                            Platform Undangan Pernikahan Digital telah berhasil diinstal. Anda dapat mulai menggunakan platform ini sekarang.
                        </p>
                        <div class="space-y-2">
                            <a href="index.php" 
                               class="block w-full bg-green-500 text-white text-center py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300">
                                Mulai Menggunakan Platform
                            </a>
                            <a href="admin_login.php" 
                               class="block w-full bg-blue-500 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                                Login sebagai Admin
                            </a>
                        </div>
                        <div class="mt-4 text-sm text-gray-600">
                            <p>Kredensial admin default:</p>
                            <ul class="list-disc list-inside">
                                <li>Username: admin</li>
                                <li>Password: admin123</li>
                            </ul>
                            <p class="mt-2 text-red-600">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Pastikan untuk mengganti password admin setelah login!
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Additional Information -->
            <div class="text-sm text-gray-500 text-center">
                <p>Butuh bantuan? Kunjungi <a href="#" class="text-blue-500 hover:text-blue-600">dokumentasi</a> atau hubungi support.</p>
            </div>
        </div>
    </div>
</body>
</html>
