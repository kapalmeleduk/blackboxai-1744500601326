</main>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand Section -->
                <div>
                    <h3 class="font-playfair text-2xl font-bold mb-4">Wedding<span class="text-pink-500">Digital</span></h3>
                    <p class="text-gray-300 text-sm">Platform undangan pernikahan digital yang membantu Anda membuat undangan pernikahan online dengan mudah dan elegan.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-300 hover:text-white transition">Beranda</a></li>
                        <li><a href="#fitur" class="text-gray-300 hover:text-white transition">Fitur</a></li>
                        <li><a href="#template" class="text-gray-300 hover:text-white transition">Template</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                    <div class="space-y-2">
                        <p class="text-gray-300 flex items-center">
                            <i class="fas fa-envelope w-6"></i>
                            info@weddingdigital.com
                        </p>
                        <p class="text-gray-300 flex items-center">
                            <i class="fas fa-phone w-6"></i>
                            +62 123 4567 890
                        </p>
                    </div>
                    <!-- Social Media Icons -->
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-300 text-sm">
                <p>&copy; <?php echo date('Y'); ?> WeddingDigital. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Additional Scripts -->
    <script>
        // Add any custom JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
