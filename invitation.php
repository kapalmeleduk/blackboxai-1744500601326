<?php
include 'db.php';
include 'header.php';

// Get the invitation code from URL
$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);

if (!$code) {
    die('Kode undangan tidak valid.');
}

// Fetch invitation details
$stmt = $conn->prepare("SELECT * FROM undangan WHERE kode_unik = ?");
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();
$invitation = $result->fetch_assoc();

if (!$invitation) {
    die('Undangan tidak ditemukan.');
}

// Format the date
$date = new DateTime($invitation['tanggal']);
$formatted_date = $date->format('d F Y');

// Template selection
if ($invitation['template'] === 'elegant') {
    // Elegant Template
    ?>
    <!-- Elegant Template -->
    <div class="min-h-screen bg-gradient-to-b from-pink-50 to-white">
        <!-- Cover Section -->
        <section class="relative h-screen flex items-center justify-center">
            <div class="absolute inset-0">
                <img src="<?php echo htmlspecialchars($invitation['foto']); ?>" 
                     alt="Wedding Photo" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-40"></div>
            </div>
            
            <div class="relative z-10 text-center text-white">
                <h1 class="font-playfair text-5xl md:text-7xl mb-6">
                    <?php echo htmlspecialchars($invitation['nama_pria']); ?>
                    <span class="text-pink-300">&</span>
                    <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
                </h1>
                <p class="text-2xl mb-8">Akan Menikah</p>
                <p class="text-xl"><?php echo $formatted_date; ?></p>
                
                <div class="mt-12">
                    <a href="#rsvp" class="bg-pink-500 text-white px-8 py-3 rounded-full hover:bg-pink-600 transition duration-300">
                        RSVP
                    </a>
                </div>
            </div>
        </section>

        <!-- Details Section -->
        <section class="py-20 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="font-playfair text-4xl mb-12">Acara Pernikahan</h2>
                
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Date Details -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <i class="fas fa-calendar-alt text-3xl text-pink-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-4">Tanggal</h3>
                        <p class="text-gray-600"><?php echo $formatted_date; ?></p>
                    </div>
                    
                    <!-- Location Details -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <i class="fas fa-map-marker-alt text-3xl text-pink-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-4">Lokasi</h3>
                        <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?></p>
                    </div>
                </div>
            </div>
        </section>

    <?php
} else {
    // Rustic Template
    ?>
    <!-- Rustic Template -->
    <div class="min-h-screen bg-amber-50">
        <!-- Cover Section -->
        <section class="relative h-screen flex items-center justify-center">
            <div class="absolute inset-0">
                <img src="<?php echo htmlspecialchars($invitation['foto']); ?>" 
                     alt="Wedding Photo" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-40"></div>
            </div>
            
            <div class="relative z-10 text-center text-white">
                <h1 class="font-playfair text-5xl md:text-7xl mb-6">
                    <?php echo htmlspecialchars($invitation['nama_pria']); ?>
                    <span class="text-amber-300">&</span>
                    <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
                </h1>
                <p class="text-2xl mb-8">We're Getting Married</p>
                <p class="text-xl"><?php echo $formatted_date; ?></p>
                
                <div class="mt-12">
                    <a href="#rsvp" class="bg-amber-700 text-white px-8 py-3 rounded-lg hover:bg-amber-800 transition duration-300">
                        RSVP
                    </a>
                </div>
            </div>
        </section>

        <!-- Details Section -->
        <section class="py-20 px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-16">
                    <img src="https://images.pexels.com/photos/1128782/pexels-photo-1128782.jpeg" 
                         alt="Decorative" 
                         class="w-32 h-32 mx-auto rounded-full object-cover mb-8">
                    <h2 class="font-playfair text-4xl mb-4">Our Special Day</h2>
                    <p class="text-gray-600">We invite you to share in our joy</p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Date Details -->
                    <div class="bg-white p-8 rounded-lg shadow-lg border border-amber-200">
                        <i class="fas fa-calendar-alt text-3xl text-amber-700 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-4">When</h3>
                        <p class="text-gray-600"><?php echo $formatted_date; ?></p>
                    </div>
                    
                    <!-- Location Details -->
                    <div class="bg-white p-8 rounded-lg shadow-lg border border-amber-200">
                        <i class="fas fa-map-marker-alt text-3xl text-amber-700 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-4">Where</h3>
                        <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?></p>
                    </div>
                </div>
            </div>
        </section>
    <?php
}
?>

<!-- RSVP Section (Common for both templates) -->
<section id="rsvp" class="py-20 px-4 bg-white">
    <div class="max-w-2xl mx-auto">
        <h2 class="font-playfair text-4xl text-center mb-12">RSVP</h2>
        
        <form action="process_rsvp.php" method="POST" class="space-y-6">
            <input type="hidden" name="invitation_code" value="<?php echo htmlspecialchars($code); ?>">
            
            <div>
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" 
                       id="nama" 
                       name="nama" 
                       required 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                       placeholder="Masukkan nama Anda">
            </div>
            
            <div>
                <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah Tamu</label>
                <select id="jumlah" 
                        name="jumlah" 
                        required 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500">
                    <option value="">Pilih jumlah tamu</option>
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?> orang</option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div>
                <label for="pesan" class="block text-gray-700 font-medium mb-2">Pesan/Ucapan</label>
                <textarea id="pesan" 
                          name="pesan" 
                          rows="4" 
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                          placeholder="Tulis pesan atau ucapan Anda"></textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 font-medium mb-2">Konfirmasi Kehadiran</label>
                <div class="space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="kehadiran" value="hadir" required class="text-pink-500">
                        <span class="ml-2">Ya, Saya akan hadir</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="kehadiran" value="tidak_hadir" required class="text-pink-500">
                        <span class="ml-2">Maaf, Saya tidak bisa hadir</span>
                    </label>
                </div>
            </div>
            
            <button type="submit" 
                    class="w-full bg-pink-500 text-white font-semibold py-3 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                Kirim RSVP
            </button>
        </form>
    </div>
</section>

<?php 
include 'footer.php';
$stmt->close();
$conn->close();
?>
