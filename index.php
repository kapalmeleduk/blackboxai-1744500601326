<?php include 'header.php'; ?>

<!-- Hero Section with Video Background -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <!-- Video Background -->
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="https://player.vimeo.com/external/374033982.sd.mp4?s=cc43b213c7639a32f6b3c7c3c4134d51a5972dc6&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-pink-500/30 to-purple-900/50"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center text-white px-4">
        <div class="animate-fade-in-up">
            <h1 class="font-playfair text-6xl md:text-7xl font-bold mb-6">
                Undangan Digital Modern
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto font-montserrat">
                Buat undangan pernikahan digital yang memukau dengan berbagai fitur interaktif
            </p>
            <div class="space-x-4">
                <a href="#buat-undangan" 
                   class="inline-block bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold px-8 py-4 rounded-full transition duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-magic mr-2"></i> Buat Undangan Sekarang
                </a>
                <button onclick="openLoginModal()" 
                        class="inline-block bg-white/20 backdrop-blur-sm text-white font-semibold px-8 py-4 rounded-full transition duration-300 hover:bg-white/30">
                    <i class="fas fa-user mr-2"></i> Login
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 animate-float">
            <i class="fas fa-heart text-pink-500 text-4xl opacity-50"></i>
        </div>
        <div class="absolute top-1/3 right-1/4 animate-float-delayed">
            <i class="fas fa-dove text-white text-3xl opacity-50"></i>
        </div>
        <div class="absolute bottom-1/4 left-1/3 animate-float">
            <i class="fas fa-ring text-yellow-500 text-3xl opacity-50"></i>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-2xl"></i>
    </div>
</section>

<!-- Features Section with Animation -->
<section id="fitur" class="py-20 bg-gradient-to-b from-white to-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-4 bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">
                Fitur Unggulan
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Buat undangan pernikahan digital Anda menjadi lebih spesial dengan fitur-fitur interaktif
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Feature Cards with Hover Effects -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-br from-pink-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-paint-brush text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center">Template Premium</h3>
                <p class="text-gray-600 text-center">Pilihan template eksklusif dengan desain modern dan elegan</p>
                <ul class="mt-4 text-sm text-gray-500 space-y-2">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Fully responsive</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Animasi smooth</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Kustomisasi penuh</li>
                </ul>
            </div>
            
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-br from-pink-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-music text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center">Musik & Gallery</h3>
                <p class="text-gray-600 text-center">Tambahkan musik dan foto-foto terbaik Anda</p>
                <ul class="mt-4 text-sm text-gray-500 space-y-2">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Background music</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Slideshow foto</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Video support</li>
                </ul>
            </div>
            
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                <div class="bg-gradient-to-br from-pink-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-gift text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-4 text-center">Amplop Digital</h3>
                <p class="text-gray-600 text-center">Terima hadiah pernikahan secara digital</p>
                <ul class="mt-4 text-sm text-gray-500 space-y-2">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Multi bank support</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> QR Code payment</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Notifikasi otomatis</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-gradient-to-r from-pink-500 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-4">
                <div class="text-4xl font-bold mb-2">1000+</div>
                <div class="text-sm opacity-80">Undangan Dibuat</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-bold mb-2">50+</div>
                <div class="text-sm opacity-80">Template Premium</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-bold mb-2">98%</div>
                <div class="text-sm opacity-80">Klien Puas</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-bold mb-2">24/7</div>
                <div class="text-sm opacity-80">Dukungan Online</div>
            </div>
        </div>
    </div>
</section>

<!-- Template Preview Section with 3D Cards -->
<section id="templates" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-4 bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">
                Template Eksklusif
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Pilih dari koleksi template premium kami yang dirancang khusus untuk hari spesial Anda
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Template Cards with 3D Hover Effect -->
            <div class="group perspective">
                <div class="relative h-[500px] transform-style-3d group-hover:rotate-y-12 duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-b from-pink-500/10 to-purple-600/10 backdrop-blur rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.pexels.com/photos/2959192/pexels-photo-2959192.jpeg" 
                             alt="Template Elegant" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <h3 class="text-2xl font-semibold text-white mb-2">Elegant Theme</h3>
                            <p class="text-white/80 mb-4">Desain mewah dengan sentuhan elegan</p>
                            <button onclick="showPreview('elegant')" 
                                    class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full hover:bg-white/30 transition-colors">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group perspective">
                <div class="relative h-[500px] transform-style-3d group-hover:rotate-y-12 duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-b from-pink-500/10 to-purple-600/10 backdrop-blur rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.pexels.com/photos/2253870/pexels-photo-2253870.jpeg" 
                             alt="Template Rustic" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <h3 class="text-2xl font-semibold text-white mb-2">Rustic Theme</h3>
                            <p class="text-white/80 mb-4">Desain vintage dengan nuansa alami</p>
                            <button onclick="showPreview('rustic')" 
                                    class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full hover:bg-white/30 transition-colors">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group perspective">
                <div class="relative h-[500px] transform-style-3d group-hover:rotate-y-12 duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-b from-pink-500/10 to-purple-600/10 backdrop-blur rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.pexels.com/photos/842876/pexels-photo-842876.jpeg" 
                             alt="Template Minimalist" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-6 flex flex-col justify-end">
                            <h3 class="text-2xl font-semibold text-white mb-2">Minimalist Theme</h3>
                            <p class="text-white/80 mb-4">Desain simpel dan modern</p>
                            <button onclick="showPreview('minimalist')" 
                                    class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full hover:bg-white/30 transition-colors">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gradient-to-b from-pink-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-4 bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">
                Testimoni
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Apa kata mereka yang telah menggunakan layanan kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial Cards -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/150?img=1" alt="User" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Sarah & John</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Undangan digital yang sangat cantik dan profesional. Semua tamu kami terkesan!"</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/150?img=2" alt="User" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Mike & Lisa</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Fitur RSVP digital sangat membantu kami dalam mengelola daftar tamu."</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/150?img=3" alt="User" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">David & Emma</h4>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">"Template yang modern dan customer service yang sangat responsif!"</p>
            </div>
        </div>
    </div>
</section>

<!-- Create Invitation Form Section -->
<section id="buat-undangan" class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-4 bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">
                Buat Undangan
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Mulai membuat undangan digital Anda sekarang
            </p>
        </div>
        
        <form action="create_invitation.php" method="POST" class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Form fields remain the same but with enhanced styling -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="group">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pria">
                        Nama Mempelai Pria
                    </label>
                    <input type="text" 
                           id="nama_pria" 
                           name="nama_pria" 
                           required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all"
                           placeholder="Masukkan nama mempelai pria">
                </div>
                <div class="group">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_wanita">
                        Nama Mempelai Wanita
                    </label>
                    <input type="text" 
                           id="nama_wanita" 
                           name="nama_wanita" 
                           required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all"
                           placeholder="Masukkan nama mempelai wanita">
                </div>
            </div>

            <!-- Rest of the form fields with enhanced styling -->
            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold py-4 px-6 rounded-lg transition duration-300 transform hover:scale-105 hover:shadow-lg">
                <i class="fas fa-heart mr-2"></i> Buat Undangan
            </button>
        </form>
    </div>
</section>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="bg-white rounded-2xl shadow-2xl w-96 p-8 relative">
            <button onclick="closeLoginModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="text-center mb-8">
                <h3 class="text-2xl font-playfair font-bold gradient-text">Login</h3>
                <p class="text-gray-600">Masuk ke akun Anda</p>
            </div>
            
            <form action="login.php" method="POST" class="space-y-6">
                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder=" " required>
                    <label class="form-label">Email</label>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" class="form-input" placeholder=" " required>
                    <label class="form-label">Password</label>
                </div>
                
                <div class="flex items-center justify-between text-sm">
                    <label class="form-checkbox">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="text-pink-500 hover:text-pink-600">Lupa password?</a>
                </div>
                
                <button type="submit" class="form-submit w-full">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </button>
                
                <div class="text-center text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="register.php" class="text-pink-500 hover:text-pink-600">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-4xl h-[80vh] rounded-2xl shadow-2xl overflow-hidden">
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

<!-- Custom Styles -->
<style>
.perspective {
    perspective: 2000px;
}
.transform-style-3d {
    transform-style: preserve-3d;
}
.rotate-y-12 {
    transform: rotateY(12deg);
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}
.animate-float {
    animation: float 3s ease-in-out infinite;
}
.animate-float-delayed {
    animation: float 3s ease-in-out infinite;
    animation-delay: 1.5s;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- Login and Preview Scripts -->
<script>
function openLoginModal() {
    document.getElementById('loginModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLoginModal() {
    document.getElementById('loginModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('loginModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLoginModal();
    }
});
</script>

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
