<?php
include 'db.php';
session_start();

// Function to generate a unique invitation code
function generateUniqueCode($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $nama_pria = filter_input(INPUT_POST, 'nama_pria', FILTER_SANITIZE_STRING);
    $nama_wanita = filter_input(INPUT_POST, 'nama_wanita', FILTER_SANITIZE_STRING);
    $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
    $lokasi = filter_input(INPUT_POST, 'lokasi', FILTER_SANITIZE_STRING);
    $foto = filter_input(INPUT_POST, 'foto', FILTER_SANITIZE_URL);
    $template = filter_input(INPUT_POST, 'template', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (!$nama_pria || !$nama_wanita || !$tanggal || !$lokasi || !$foto || !$template) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: index.php#buat-undangan");
        exit();
    }

    // Generate unique code for the invitation
    $unique_code = generateUniqueCode();
    
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO undangan (nama_pria, nama_wanita, tanggal, lokasi, foto, template, kode_unik) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("sssssss", $nama_pria, $nama_wanita, $tanggal, $lokasi, $foto, $template, $unique_code);
        
        // Execute the statement
        if ($stmt->execute()) {
            $invitation_id = $stmt->insert_id;
            $_SESSION['success'] = "Undangan berhasil dibuat!";
            
            // Redirect to the invitation preview page
            header("Location: invitation.php?code=" . $unique_code);
            exit();
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat membuat undangan. Silakan coba lagi.";
            header("Location: index.php#buat-undangan");
            exit();
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan dalam sistem. Silakan coba lagi.";
        header("Location: index.php#buat-undangan");
        exit();
    }
    
} else {
    // If accessed directly without POST data, redirect to index
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!-- Error Display -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
