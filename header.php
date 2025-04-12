<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Wedding Invitation</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💑</text></svg>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Common Styles -->
    <link rel="stylesheet" href="assets/css/common/base.css">
    <link rel="stylesheet" href="assets/css/common/utilities.css">
    <link rel="stylesheet" href="assets/css/common/animations.css">

    <!-- Component Styles -->
    <link rel="stylesheet" href="assets/css/components/gallery.css">
    <link rel="stylesheet" href="assets/css/components/countdown.css">
    <link rel="stylesheet" href="assets/css/components/forms.css">

    <!-- Template Styles -->
    <link rel="stylesheet" href="assets/css/templates/elegant.css">
    <link rel="stylesheet" href="assets/css/templates/rustic.css">
    <link rel="stylesheet" href="assets/css/templates/minimalist.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['"Playfair Display"', 'serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body>
    <!-- Navigation if needed -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-transparent">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="index.php" class="text-white hover:text-gray-200 transition-colors">
                    <i class="fas fa-home"></i>
                </a>
                <?php if(isset($_SESSION['admin'])): ?>
                    <div class="flex items-center space-x-4">
                        <a href="admin_dashboard.php" class="text-white hover:text-gray-200 transition-colors">
                            Dashboard
                        </a>
                        <a href="logout.php" class="text-white hover:text-gray-200 transition-colors">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main>
