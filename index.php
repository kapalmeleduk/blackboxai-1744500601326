<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.pexels.com/photos/169198/pexels-photo-169198.jpeg" 
             alt="Wedding Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="font-playfair text-5xl md:text-6xl font-bold mb-6">
            Undangan Pernikahan Digital
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
            Buat undangan pernikahan digital yang elegan dan personal untuk momen spesial Anda
        </p>
        <a href="#buat-undangan" 
           class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-8 py-3 rounded-full transition duration-300 transform hover:scale-105">
            Buat Undangan Sekarang
        </a>
    </div>
</section>

<!-- Features Section -->
<section id="fitur" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-playfair font-bold text-center mb-16">Fitur Unggulan</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Feature 1 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-paint-brush text-2xl text-pink-500"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Template Menarik</h3>
                <p class="text-gray-600">Pilih dari berbagai template undangan yang elegan dan dapat disesuaikan</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-share-alt text-2xl text-pink-500"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">Mudah Dibagikan</h3>
                <p class="text-gray-600">Bagikan undangan digital Anda dengan mudah melalui berbagai platform</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-2xl text-pink-500"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4">RSVP Digital</h3>
                <p class="text-gray-600">Kelola konfirmasi kehadiran tamu dengan sistem RSVP digital yang praktis</p>
            </div>
        </div>
    </div>
</section>

<!-- Template Preview Section -->
<section id="templates" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-playfair font-bold text-center mb-16">Pilihan Template</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Elegant Template -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative h-96">
                    <img src="https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg" 
                         alt="Template Elegant" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <button onclick="showPreview('elegant')" 
                                class="bg-white text-gray-800 px-6 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-colors">
                            Lihat Preview
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Elegant Theme</h3>
                    <p class="text-gray-600 mb-4">Desain mewah dengan sentuhan elegan dan modern</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>4.9/5 (120 pengguna)</span>
                    </div>
                </div>
            </div>

            <!-- Rustic Template -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative h-96">
                    <img src="https://images.pexels.com/photos/2253870/pexels-photo-2253870.jpeg" 
                         alt="Template Rustic" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <button onclick="showPreview('rustic')" 
                                class="bg-white text-gray-800 px-6 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-colors">
                            Lihat Preview
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Rustic Theme</h3>
                    <p class="text-gray-600 mb-4">Desain vintage dengan nuansa alami dan hangat</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>4.8/5 (98 pengguna)</span>
                    </div>
                </div>
            </div>

            <!-- Minimalist Template -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="relative h-96">
                    <img src="https://images.pexels.com/photos/842876/pexels-photo-842876.jpeg" 
                         alt="Template Minimalist" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <button onclick="showPreview('minimalist')" 
                                class="bg-white text-gray-800 px-6 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-colors">
                            Lihat Preview
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Minimalist Theme</h3>
                    <p class="text-gray-600 mb-4">Desain simpel dan bersih dengan fokus pada konten</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>4.7/5 (85 pengguna)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Create Invitation Form Section -->
<section id="buat-undangan" class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-playfair font-bold text-center mb-16">Buat Undangan Anda</h2>
        
        <form action="create_invitation.php" method="POST" class="bg-white rounded-lg shadow-lg p-8">
            <!-- Couple Names -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pria">
                        Nama Mempelai Pria
                    </label>
                    <input type="text" 
                           id="nama_pria" 
                           name="nama_pria" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                           placeholder="Masukkan nama mempelai pria">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_wanita">
                        Nama Mempelai Wanita
                    </label>
                    <input type="text" 
                           id="nama_wanita" 
                           name="nama_wanita" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                           placeholder="Masukkan nama mempelai wanita">
                </div>
            </div>

            <!-- Parents Names -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Orang Tua Mempelai Pria</label>
                    <input type="text" 
                           name="nama_ayah_pria" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500 mb-2"
                           placeholder="Nama Ayah">
                    <input type="text" 
                           name="nama_ibu_pria" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                           placeholder="Nama Ibu">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Orang Tua Mempelai Wanita</label>
                    <input type="text" 
                           name="nama_ayah_wanita" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500 mb-2"
                           placeholder="Nama Ayah">
                    <input type="text" 
                           name="nama_ibu_wanita" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                           placeholder="Nama Ibu">
                </div>
            </div>
            
            <!-- Date and Times -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                        Tanggal Pernikahan
                    </label>
                    <input type="date" 
                           id="tanggal" 
                           name="tanggal" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Waktu Acara</label>
                    <input type="time" 
                           name="ceremony_time" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500 mb-2"
                           placeholder="Waktu Akad">
                    <input type="time" 
                           name="reception_time" 
                           required 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                           placeholder="Waktu Resepsi">
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="lokasi">
                    Lokasi Pernikahan
                </label>
                <textarea id="lokasi" 
                          name="lokasi" 
                          required 
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500"
                          rows="3"
                          placeholder="Masukkan alamat lengkap lokasi pernikahan"></textarea>
            </div>
            
            <!-- Photo Upload -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">
                    Foto Prewedding
                </label>
                <input type="file" 
                       id="foto" 
                       name="foto" 
                       accept="image/*"
                       required 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-pink-500">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG. Maksimal 5MB</p>
            </div>
            
            <!-- Template Selection -->
            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-4">
                    Pilih Template
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="template" value="elegant" class="sr-only" required>
                        <div class="border-2 border-gray-200 rounded-lg p-4 hover:border-pink-500 transition-colors">
                            <img src="https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg" 
                                 alt="Template Elegant" 
                                 class="w-full h-40 object-cover rounded mb-2">
                            <p class="text-center font-semibold">Elegant Theme</p>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="template" value="rustic" class="sr-only" required>
                        <div class="border-2 border-gray-200 rounded-lg p-4 hover:border-pink-500 transition-colors">
                            <img src="https://images.pexels.com/photos/2253870/pexels-photo-2253870.jpeg" 
                                 alt="Template Rustic" 
                                 class="w-full h-40 object-cover rounded mb-2">
                            <p class="text-center font-semibold">Rustic Theme</p>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="template" value="minimalist" class="sr-only" required>
                        <div class="border-2 border-gray-200 rounded-lg p-4 hover:border-pink-500 transition-colors">
                            <img src="https://images.pexels.com/photos/842876/pexels-photo-842876.jpeg" 
                                 alt="Template Minimalist" 
                                 class="w-full h-40 object-cover rounded mb-2">
                            <p class="text-center font-semibold">Minimalist Theme</p>
                        </div>
                    </label>
                </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                Buat Undangan
            </button>
        </form>
    </div>
</section>

<!-- Preview Modal -->
<div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-4xl h-[80vh] rounded-lg shadow-xl overflow-hidden">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold">Preview Template</h3>
                <button onclick="closePreview()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="h-full overflow-y-auto">
                <iframe id="previewFrame" class="w-full h-full"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-playfair font-bold text-center mb-16">Cara Kerja</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-pink-500">1</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Isi Data</h3>
                <p class="text-gray-600">Masukkan informasi pernikahan Anda pada form yang tersedia</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-pink-500">2</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Pilih Template</h3>
                <p class="text-gray-600">Pilih desain undangan yang sesuai dengan tema pernikahan Anda</p>
            </div>
            
            <!-- Step 3 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-pink-500">3</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Dapatkan Link</h3>
                <p class="text-gray-600">Terima link undangan digital yang siap dibagikan</p>
            </div>
            
            <!-- Step 4 -->
            <div class="text-center">
                <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-pink-500">4</span>
                </div>
                <h3 class="text-xl font-semibold mb-4">Bagikan</h3>
                <p class="text-gray-600">Bagikan undangan kepada tamu dan pantau konfirmasi kehadiran</p>
            </div>
        </div>
    </div>
</section>

<!-- Preview Script -->
<script>
function showPreview(template) {
    const modal = document.getElementById('previewModal');
    const frame = document.getElementById('previewFrame');
    
    // Set up demo data
    const demoData = {
        nama_pria: 'John Doe',
        nama_wanita: 'Jane Smith',
        tanggal: '2024-06-15',
        lokasi: 'Grand Ballroom, Hotel Example\nJl. Example No. 123',
        foto: 'https://images.pexels.com/photos/1024993/pexels-photo-1024993.jpeg'
    };
    
    // Create a temporary form and submit it to the preview URL
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `preview_template.php?template=${template}`;
    form.target = 'previewFrame';
    
    // Add demo data to form
    for (const [key, value] of Object.entries(demoData)) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
    
    document.body.appendChild(form);
    modal.classList.remove('hidden');
    form.submit();
    document.body.removeChild(form);
}

function closePreview() {
    const modal = document.getElementById('previewModal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('previewModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePreview();
    }
});
</script>

<?php include 'footer.php'; ?>
