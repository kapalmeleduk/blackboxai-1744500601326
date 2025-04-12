<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $invitation_code = filter_input(INPUT_POST, 'invitation_code', FILTER_SANITIZE_STRING);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_SANITIZE_NUMBER_INT);
    $pesan = filter_input(INPUT_POST, 'pesan', FILTER_SANITIZE_STRING);
    $kehadiran = filter_input(INPUT_POST, 'kehadiran', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (!$invitation_code || !$nama || !$jumlah || !$kehadiran) {
        $_SESSION['error'] = "Semua field wajib diisi!";
        header("Location: invitation.php?code=" . $invitation_code . "#rsvp");
        exit();
    }

    // Get invitation ID from code
    $stmt = $conn->prepare("SELECT id FROM undangan WHERE kode_unik = ?");
    $stmt->bind_param("s", $invitation_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $invitation = $result->fetch_assoc();
    
    if (!$invitation) {
        $_SESSION['error'] = "Undangan tidak ditemukan.";
        header("Location: invitation.php?code=" . $invitation_code . "#rsvp");
        exit();
    }

    // Prepare SQL statement for RSVP insertion
    $stmt = $conn->prepare("INSERT INTO rsvp (undangan_id, nama_tamu, jumlah_hadir, pesan, status_kehadiran, waktu_submit) VALUES (?, ?, ?, ?, ?, NOW())");
    
    if ($stmt) {
        $undangan_id = $invitation['id'];
        $stmt->bind_param("isiss", $undangan_id, $nama, $jumlah, $pesan, $kehadiran);
        
        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Terima kasih telah mengkonfirmasi kehadiran Anda!";
            
            // Show different message based on attendance status
            if ($kehadiran === 'hadir') {
                $_SESSION['success'] .= " Kami menantikan kehadiran Anda di acara pernikahan kami.";
            } else {
                $_SESSION['success'] .= " Kami menghargai konfirmasi Anda.";
            }
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat menyimpan RSVP. Silakan coba lagi.";
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan sistem. Silakan coba lagi.";
    }
    
    // Redirect back to invitation page
    header("Location: invitation.php?code=" . $invitation_code . "#rsvp");
    exit();
    
} else {
    // If accessed directly without POST data, redirect to home
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!-- Success Message -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sukses!</strong>
        <span class="block sm:inline"><?php echo $_SESSION['success']; ?></span>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Error Message -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
