<?php
session_start();
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Get invitation ID
$invitation_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!$invitation_id) {
    die('ID undangan tidak valid.');
}

// Fetch invitation details
$stmt = $conn->prepare("SELECT * FROM undangan WHERE id = ?");
$stmt->bind_param("i", $invitation_id);
$stmt->execute();
$invitation = $stmt->get_result()->fetch_assoc();

if (!$invitation) {
    die('Undangan tidak ditemukan.');
}

// Fetch RSVP responses
$stmt = $conn->prepare("
    SELECT * FROM rsvp 
    WHERE undangan_id = ? 
    ORDER BY waktu_submit DESC
");
$stmt->bind_param("i", $invitation_id);
$stmt->execute();
$rsvp_responses = $stmt->get_result();

// Calculate statistics
$stats = [
    'total_responses' => $rsvp_responses->num_rows,
    'total_attending' => 0,
    'total_not_attending' => 0,
    'total_guests' => 0
];

$temp_responses = [];
while ($row = $rsvp_responses->fetch_assoc()) {
    $temp_responses[] = $row;
    if ($row['status_kehadiran'] === 'hadir') {
        $stats['total_attending']++;
        $stats['total_guests'] += $row['jumlah_hadir'];
    } else {
        $stats['total_not_attending']++;
    }
}

include 'header.php';
?>

<div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="admin_dashboard.php" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
            </a>
        </div>

        <!-- Invitation Details -->
        <div class="bg-white shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    Detail Undangan
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-500">Nama Pasangan</p>
                        <p class="text-lg font-medium">
                            <?php echo htmlspecialchars($invitation['nama_pria']); ?> &
                            <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Pernikahan</p>
                        <p class="text-lg font-medium">
                            <?php echo date('d F Y', strtotime($invitation['tanggal'])); ?>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Lokasi</p>
                        <p class="text-lg font-medium">
                            <?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Template</p>
                        <p class="text-lg font-medium">
                            <?php echo ucfirst($invitation['template']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RSVP Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <!-- Total Responses -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                        <i class="fas fa-reply text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Respons</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['total_responses']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Attending -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500">
                        <i class="fas fa-check text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Akan Hadir</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['total_attending']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Not Attending -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500">
                        <i class="fas fa-times text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Tidak Hadir</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['total_not_attending']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Total Guests -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Tamu</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['total_guests']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RSVP Responses Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-xl font-semibold text-gray-900">Daftar RSVP</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tamu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Submit</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($temp_responses as $response): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?php echo htmlspecialchars($response['nama_tamu']); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($response['status_kehadiran'] === 'hadir'): ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Hadir
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Tidak Hadir
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo $response['jumlah_hadir']; ?> orang
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <?php echo nl2br(htmlspecialchars($response['pesan'])); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo date('d M Y H:i', strtotime($response['waktu_submit'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($temp_responses)): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada respons RSVP
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
$stmt->close();
$conn->close();
?>
