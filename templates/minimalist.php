<?php
// Get invitation data from parent scope
if (!isset($invitation)) {
    die('Direct access not allowed');
}
?>

<div class="template-minimalist">
    <!-- Hero Section -->
    <section class="wedding-cover relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="<?php echo htmlspecialchars($invitation['foto']); ?>" 
                 alt="Wedding Cover" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
            <p class="text-lg mb-4 tracking-[0.2em] uppercase">We Are Getting Married</p>
            
            <h1 class="couple-names font-playfair text-5xl md:text-7xl mb-8">
                <?php echo htmlspecialchars($invitation['nama_pria']); ?>
                <span class="block text-3xl my-4">&</span>
                <?php echo htmlspecialchars($invitation['nama_wanita']); ?>
            </h1>
            
            <div class="wedding-details">
                <div class="w-24 h-[1px] bg-white mx-auto mb-6"></div>
                <p class="text-xl mb-2"><?php echo $formatted_date; ?></p>
                <p class="text-lg opacity-80"><?php echo nl2br(htmlspecialchars($invitation['lokasi'])); ?></p>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
            <a href="#details" class="text-white opacity-70 hover:opacity-100 transition-opacity">
                <div class="flex flex-col items-center">
                    <span class="text-sm mb-2">Scroll</span>
                    <i class="fas fa-chevron-down animate-bounce"></i>
                </div>
            </a>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-2xl font-light text-gray-600 italic">
                "Love is patient, love is kind. It does not envy, it does not boast, it is not proud."
            </p>
            <p class="mt-4 text-gray-500">1 Corinthians 13:4</p>
        </div>
    </section>

    <!-- Details Section -->
    <section id="details" class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Ceremony -->
                <div class="text-center p-8 border border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">The Ceremony</h3>
                    <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4">
                        <i class="fas fa-rings-wedding text-gray-600 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-2"><?php echo $formatted_date; ?></p>
                    <p class="text-gray-600">10:00 AM - 11:00 AM</p>
                </div>

                <!-- Reception -->
                <div class="text-center p-8 border border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">The Reception</h3>
                    <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4">
                        <i class="fas fa-glass-cheers text-gray-600 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-2"><?php echo $formatted_date; ?></p>
                    <p class="text-gray-600">12:00 PM - 15:00 PM</p>
                </div>

                <!-- Dinner -->
                <div class="text-center p-8 border border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">The Dinner</h3>
                    <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4">
                        <i class="fas fa-utensils text-gray-600 text-2xl"></i>
                    </div>
                    <p class="text-gray-600 mb-2"><?php echo $formatted_date; ?></p>
                    <p class="text-gray-600">18:00 PM - 21:00 PM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Countdown Section -->
    <section class="py-20 px-4 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl mb-12">Counting Down To The Big Day</h2>
            
            <div class="countdown-timer grid grid-cols-2 md:grid-cols-4 gap-4" id="countdown">
                <div class="p-6 border border-gray-700">
                    <div class="countdown-number text-4xl font-light" id="days">00</div>
                    <div class="countdown-label text-sm uppercase tracking-wider mt-2">Days</div>
                </div>
                <div class="p-6 border border-gray-700">
                    <div class="countdown-number text-4xl font-light" id="hours">00</div>
                    <div class="countdown-label text-sm uppercase tracking-wider mt-2">Hours</div>
                </div>
                <div class="p-6 border border-gray-700">
                    <div class="countdown-number text-4xl font-light" id="minutes">00</div>
                    <div class="countdown-label text-sm uppercase tracking-wider mt-2">Minutes</div>
                </div>
                <div class="p-6 border border-gray-700">
                    <div class="countdown-number text-4xl font-light" id="seconds">00</div>
                    <div class="countdown-label text-sm uppercase tracking-wider mt-2">Seconds</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl text-center mb-12">Our Moments</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
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
                    <div class="aspect-square overflow-hidden">
                        <img src="<?php echo $image; ?>" 
                             alt="Gallery Image" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RSVP Section -->
    <section id="rsvp" class="py-20 px-4 bg-gray-50">
        <div class="max-w-xl mx-auto text-center">
            <h2 class="text-3xl mb-8">Will You Attend?</h2>
            <p class="text-gray-600 mb-12">We would be honored to have you join us on our special day.</p>
            
            <form action="process_rsvp.php" method="POST" class="space-y-6">
                <input type="hidden" name="invitation_code" value="<?php echo htmlspecialchars($code); ?>">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" 
                           name="nama" 
                           required 
                           placeholder="Your Name"
                           class="w-full px-4 py-2 border border-gray-300 focus:border-gray-500 focus:outline-none">
                           
                    <select name="jumlah" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 focus:border-gray-500 focus:outline-none">
                        <option value="">Number of Guests</option>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'person' : 'people'; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                
                <textarea name="pesan" 
                          rows="4" 
                          placeholder="Your Message"
                          class="w-full px-4 py-2 border border-gray-300 focus:border-gray-500 focus:outline-none"></textarea>
                
                <div class="flex justify-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="kehadiran" value="hadir" required class="form-radio text-gray-600">
                        <span class="ml-2">I Will Attend</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="kehadiran" value="tidak_hadir" required class="form-radio text-gray-600">
                        <span class="ml-2">I Cannot Attend</span>
                    </label>
                </div>
                
                <button type="submit" 
                        class="bg-gray-900 text-white px-8 py-3 hover:bg-gray-800 transition-colors">
                    Send RSVP
                </button>
            </form>
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
