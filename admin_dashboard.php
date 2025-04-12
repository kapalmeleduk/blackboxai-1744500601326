<?php
session_start();
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin_login.php");
    exit();
}

// Fetch all invitations with their RSVP counts
$query = "
    SELECT 
        u.*,
        COUNT(DISTINCT r.id) as total_rsvp,
        SUM(CASE WHEN r.status_kehadiran = 'hadir' THEN r.jumlah_hadir ELSE 0 END) as total_hadir
    FROM undangan u
    LEFT JOIN rsvp r ON u.id = r.undangan_id
    GROUP BY u.id
    ORDER BY u.id DESC
";

$invitations = $conn->query($query);

include 'header.php';
?>

<div class="min-h-screen bg-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Dashboard Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
            <a href="?logout" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <?php
            $total_invitations = $invitations->num_rows;
            
            $stats_query = "
                SELECT 
                    COUNT(DISTINCT undangan_id) as undangan_dengan_rsvp,
                    SUM(CASE WHEN status_kehadiran = 'hadir' THEN jumlah_hadir ELSE 0 END) as total_tamu_hadir
                FROM rsvp
            ";
            $stats = $conn->query($stats_query)->fetch_assoc();
            ?>
            
            <!-- Total Undangan -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 text-pink-500">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Undangan</p>
                        <p class="text-2xl font-semibold"><?php echo $total_invitations; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Undangan dengan RSVP -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Undangan dengan RSVP</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['undangan_dengan_rsvp']; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Total Tamu Hadir -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Tamu Hadir</p>
                        <p class="text-2xl font-semibold"><?php echo $stats['total_tamu_hadir'] ?? 0; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invitations Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-xl font-semibold text-gray-900">Daftar Undangan</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pasangan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Template</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total RSVP</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tamu Hadir</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php while ($invitation = $invitations->fetch_assoc()): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?php echo htmlspecialchars($invitation['nama_pria']); ?> &
                                        <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <?php echo date('d F Y', strtotime($invitation['tanggal'])); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <?php echo ucfirst($invitation['template']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo $invitation['total_rsvp']; ?> RSVP
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo $invitation['total_hadir'] ?? 0; ?> tamu
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="view_rsvp.php?id=<?php echo $invitation['id']; ?>" 
                                       class="text-pink-600 hover:text-pink-900 mr-3">
                                        <i class="fas fa-eye"></i> Lihat RSVP
                                    </a>
                                    <a href="invitation.php?code=<?php echo $invitation['kode_unik']; ?>" 
                                       target="_blank"
                                       class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-external-link-alt"></i> Lihat Undangan
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
$conn->close();
?>
