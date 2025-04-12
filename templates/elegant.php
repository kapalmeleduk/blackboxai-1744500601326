<?php
// Get invitation data from parent scope
if (!isset($invitation)) {
    die('Direct access not allowed');
}
?>

<div class="template-elegant">
    <!-- Cover Section -->
    <section class="wedding-cover relative h-screen flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="<?php echo htmlspecialchars($invitation['foto']); ?>" 
                 alt="Wedding Cover" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4">
            <div class="elegant-ornament mb-8"></div>
            
            <h1 class="couple-names font-playfair text-5xl md:text-7xl mb-6">
                <?php echo htmlspecialchars($invitation['nama_pria']); ?>
                <span class="text-pink-300">&</span>
                <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
            </h1>
            
            <div class="wedding-details">
                <div class="elegant-divider"></div>
                <p class="text-2xl mb-4">We Are Getting Married</p>
                <p class="text-xl"><?php echo $formatted_date; ?></p>
            </div>
            
            <!-- Countdown Timer -->
            <div class="countdown-timer mt-12" id="countdown">
                <div class="countdown-item">
                    <div class="countdown-number" id="days">00</div>
                    <div class="countdown-label">Days</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hours">00</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-number" id="minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-number" id="seconds">00</div>
                    <div class="countdown-label">Seconds</div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
        </div>
    </section>

    <!-- Couple Section -->
    <section class="py-20 px-4 bg-pink-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16">The Happy Couple</h2>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Groom -->
                <div class="space-y-4">
                    <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-pink-200">
                        <img src="https://images.pexels.com/photos/937481/pexels-photo-937481.jpeg" 
                             alt="Groom" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-semibold"><?php echo htmlspecialchars($invitation['nama_pria']); ?></h3>
                    <p class="text-gray-600">Son of Mr. & Mrs. [Father's Name]</p>
                </div>
                
                <!-- Bride -->
                <div class="space-y-4">
                    <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-pink-200">
                        <img src="https://images.pexels.com/photos/1374509/pexels-photo-1374509.jpeg" 
                             alt="Bride" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-semibold"><?php echo htmlspecialchars($invitation['nama_wanita']); ?></h3>
                    <p class="text-gray-600">Daughter of Mr. & Mrs. [Father's Name]</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details -->
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16">Wedding Ceremony</h2>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="elegant-ornament mb-8"></div>
                
                <div class="space-y-6">
                    <div>
                        <i class="fas fa-calendar-alt text-3xl text-pink-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-2">When</h3>
                        <p class="text-gray-600"><?php echo $formatted_date; ?></p>
                    </div>
                    
                    <div class="elegant-divider"></div>
                    
                    <div>
                        <i class="fas fa-map-marker-alt text-3xl text-pink-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold mb-2">Where</h3>
                        <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?></p>
                    </div>
                </div>
                
                <div class="elegant-ornament mt-8"></div>
            </div>
        </div>
    </section>

    <!-- Love Story -->
    <section class="py-20 px-4 bg-pink-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16">Our Love Story</h2>
            
            <div class="space-y-12">
                <!-- First Meet -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4">
                        <i class="fas fa-heart text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">First Meet</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                
                <!-- First Date -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4">
                        <i class="fas fa-coffee text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">First Date</h3>
                    <p class="text-gray-600">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                
                <!-- Engagement -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4">
                        <i class="fas fa-ring text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Engagement</h3>
                    <p class="text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-playfair text-4xl text-center mb-16">Our Gallery</h2>
            
            <div class="gallery-grid">
                <?php
                $gallery_images = [
                    "https://images.pexels.com/photos/1024993/pexels-photo-1024993.jpeg",
                    "https://images.pexels.com/photos/1139784/pexels-photo-1139784.jpeg",
                    "https://images.pexels.com/photos/1589216/pexels-photo-1589216.jpeg",
                    "https://images.pexels.com/photos/1589825/pexels-photo-1589825.jpeg",
                    "https://images.pexels.com/photos/1589827/pexels-photo-1589827.jpeg",
                    "https://images.pexels.com/photos/1589829/pexels-photo-1589829.jpeg"
                ];
                
                foreach ($gallery_images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo $image; ?>" 
                             alt="Gallery Image" 
                             class="w-full h-64 object-cover">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<!-- Countdown Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set the wedding date
    const weddingDate = new Date("<?php echo $invitation['tanggal']; ?>").getTime();
    
    // Update countdown every second
    const countdown = setInterval(function() {
        const now = new Date().getTime();
        const distance = weddingDate - now;
        
        // Calculate days, hours, minutes, seconds
        document.getElementById("days").innerHTML = Math.floor(distance / (1000 * 60 * 60 * 24));
        document.getElementById("hours").innerHTML = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        document.getElementById("minutes").innerHTML = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        document.getElementById("seconds").innerHTML = Math.floor((distance % (1000 * 60)) / 1000);
        
        // If countdown is finished
        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById("countdown").innerHTML = "The Wedding Day Has Arrived!";
        }
    }, 1000);
});
</script>
