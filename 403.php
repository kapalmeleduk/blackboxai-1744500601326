<?php include 'header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center">
        <div class="mb-8">
            <i class="fas fa-lock text-pink-500 text-6xl mb-4"></i>
            <h2 class="text-4xl font-bold text-gray-900 mb-2">403</h2>
            <p class="text-xl text-gray-600">Akses Ditolak</p>
        </div>
        
        <div class="text-gray-600 mb-8">
            <p>Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</p>
            <p class="mt-2">Silakan pastikan Anda memiliki akses yang sesuai atau kembali ke halaman beranda.</p>
        </div>
        
        <div class="space-y-4">
            <a href="index.php" class="inline-block bg-pink-500 text-white px-6 py-3 rounded-lg hover:bg-pink-600 transition duration-300">
                <i class="fas fa-home mr-2"></i>Kembali ke Beranda
            </a>
            
            <p class="text-sm text-gray-500 mt-4">
                Jika Anda yakin seharusnya memiliki akses, silakan <a href="mailto:support@weddingdigital.com" class="text-pink-500 hover:text-pink-600">hubungi admin</a>.
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
