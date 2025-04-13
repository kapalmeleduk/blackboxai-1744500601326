<?php
// Get invitation data from parent scope
if (!isset($invitation)) {
    die('Direct access not allowed');
}
?>

<div class="template-elegant">
    <!-- Floating Hearts Animation -->
    <div class="floating-hearts">
        <?php for($i = 1; $i <= 10; $i++): ?>
            <i class="fas fa-heart floating-heart" style="
                left: <?php echo rand(0, 100); ?>%;
                top: <?php echo rand(0, 100); ?>%;
                font-size: <?php echo rand(10, 30); ?>px;
                animation-delay: <?php echo $i * 0.5; ?>s;
            "></i>
        <?php endfor; ?>
    </div>

    <!-- Cover Section -->
    <section class="wedding-cover relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="<?php echo htmlspecialchars($invitation['foto']); ?>" 
                 alt="Wedding Cover" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-pink-500/30 to-purple-900/50"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4">
            <div class="animate-fade-in-up">
                <div class="elegant-ornament mb-8"></div>
                
                <h1 class="couple-names font-playfair text-5xl md:text-7xl mb-6">
                    <?php echo htmlspecialchars($invitation['nama_pria']); ?>
                    <span class="text-pink-300 animate-pulse">&</span>
                    <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
                </h1>
                
                <div class="wedding-details glass-card p-6 max-w-lg mx-auto">
                    <div class="elegant-divider"></div>
                    <p class="text-2xl mb-4 gradient-text font-playfair">We Are Getting Married</p>
                    <p class="text-xl"><?php echo $formatted_date; ?></p>
                </div>
            </div>
            
            <!-- Countdown Timer -->
            <div class="countdown-timer mt-12" id="countdown">
                <div class="countdown-item animate-fade-in delay-100">
                    <div class="countdown-number" id="days">00</div>
                    <div class="countdown-label">Days</div>
                </div>
                <div class="countdown-item animate-fade-in delay-200">
                    <div class="countdown-number" id="hours">00</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div class="countdown-item animate-fade-in delay-300">
                    <div class="countdown-number" id="minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div class="countdown-item animate-fade-in delay-400">
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
    <section class="py-20 px-4 bg-gradient-to-b from-pink-50 to-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16 gradient-text">The Happy Couple</h2>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Groom -->
                <div class="space-y-4 glass-card p-8 hover:scale-105 transition-transform duration-300">
                    <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-pink-200 hover:border-pink-300 transition-colors">
                        <img src="https://images.pexels.com/photos/937481/pexels-photo-937481.jpeg" 
                             alt="Groom" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-semibold gradient-text"><?php echo htmlspecialchars($invitation['nama_pria']); ?></h3>
                    <p class="text-gray-600">Son of Mr. & Mrs. <?php echo htmlspecialchars($invitation['nama_ayah_pria']); ?></p>
                    <div class="social-icons space-x-4">
                        <a href="#" class="text-pink-500 hover:text-pink-600 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-pink-500 hover:text-pink-600 transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Bride -->
                <div class="space-y-4 glass-card p-8 hover:scale-105 transition-transform duration-300">
                    <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-4 border-pink-200 hover:border-pink-300 transition-colors">
                        <img src="https://images.pexels.com/photos/1374509/pexels-photo-1374509.jpeg" 
                             alt="Bride" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-2xl font-semibold gradient-text"><?php echo htmlspecialchars($invitation['nama_wanita']); ?></h3>
                    <p class="text-gray-600">Daughter of Mr. & Mrs. <?php echo htmlspecialchars($invitation['nama_ayah_wanita']); ?></p>
                    <div class="social-icons space-x-4">
                        <a href="#" class="text-pink-500 hover:text-pink-600 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-pink-500 hover:text-pink-600 transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16 gradient-text">Wedding Ceremony</h2>
            
            <div class="glass-card p-8 hover:scale-105 transition-transform duration-300">
                <div class="elegant-ornament mb-8"></div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="event-card p-6">
                            <i class="fas fa-ring text-3xl text-pink-500 mb-4 animate-pulse"></i>
                            <h3 class="text-2xl font-semibold mb-2">Akad Nikah</h3>
                            <p class="text-gray-600"><?php echo $formatted_date; ?></p>
                            <p class="text-gray-600"><?php echo htmlspecialchars($invitation['ceremony_time']); ?></p>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="event-card p-6">
                            <i class="fas fa-glass-cheers text-3xl text-pink-500 mb-4 animate-pulse"></i>
                            <h3 class="text-2xl font-semibold mb-2">Resepsi</h3>
                            <p class="text-gray-600"><?php echo $formatted_date; ?></p>
                            <p class="text-gray-600"><?php echo htmlspecialchars($invitation['reception_time']); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <i class="fas fa-map-marker-alt text-3xl text-pink-500 mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-2">Lokasi</h3>
                    <p class="text-gray-600"><?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?></p>
                    <a href="#" class="inline-block mt-4 bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition-colors">
                        <i class="fas fa-map-marked-alt mr-2"></i>Lihat Peta
                    </a>
                </div>
                
                <div class="elegant-ornament mt-8"></div>
            </div>
        </div>
    </section>

    <!-- Love Story -->
    <section class="py-20 px-4 bg-gradient-to-b from-white to-pink-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16 gradient-text">Our Love Story</h2>
            
            <div class="space-y-12">
                <!-- First Meet -->
                <div class="story-card glass-card p-8">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4 story-icon">
                        <i class="fas fa-heart text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 gradient-text">First Meet</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                
                <!-- First Date -->
                <div class="story-card glass-card p-8">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4 story-icon">
                        <i class="fas fa-coffee text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 gradient-text">First Date</h3>
                    <p class="text-gray-600">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                
                <!-- Engagement -->
                <div class="story-card glass-card p-8">
                    <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center mb-4 story-icon">
                        <i class="fas fa-ring text-pink-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 gradient-text">Engagement</h3>
                    <p class="text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-playfair text-4xl text-center mb-16 gradient-text">Our Gallery</h2>
            
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
                
                foreach ($gallery_images as $index => $image): ?>
                    <div class="gallery-item animate-fade-in" style="animation-delay: <?php echo $index * 0.2; ?>s">
                        <img src="<?php echo $image; ?>" 
                             alt="Gallery Image" 
                             class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 hover:opacity-100 transition-opacity flex items-end justify-center p-4">
                            <button class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full hover:bg-white/30 transition-colors">
                                <i class="fas fa-expand-alt mr-2"></i>View
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RSVP Section -->
    <section class="py-20 px-4 bg-gradient-to-b from-pink-50 to-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="font-playfair text-4xl mb-16 gradient-text">RSVP</h2>
            
            <div class="glass-card p-8">
                <form action="process_rsvp.php" method="POST" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <input type="text" name="name" placeholder="Your Name" required
                                   class="w-full px-4 py-2 rounded-lg border border-pink-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Your Email" required
                                   class="w-full px-4 py-2 rounded-lg border border-pink-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all">
                        </div>
                    </div>
                    
                    <div>
                        <select name="attendance" required
                                class="w-full px-4 py-2 rounded-lg border border-pink-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all">
                            <option value="">Will you attend?</option>
                            <option value="yes">Yes, I will attend</option>
                            <option value="no">Sorry, I can't attend</option>
                        </select>
                    </div>
                    
                    <div>
                        <input type="number" name="guests" placeholder="Number of Guests" min="0" max="5"
                               class="w-full px-4 py-2 rounded-lg border border-pink-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all">
                    </div>
                    
                    <div>
                        <textarea name="message" placeholder="Your Message" rows="4"
                                  class="w-full px-4 py-2 rounded-lg border border-pink-200 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all"></textarea>
                    </div>
                    
                    <button type="submit" 
                            class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold px-8 py-3 rounded-full hover:opacity-90 transition-opacity transform hover:scale-105">
                        Send RSVP
                    </button>
                </form>
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
