# Platform Undangan Pernikahan Digital

Sebuah platform web untuk membuat dan mengelola undangan pernikahan digital dengan sistem RSVP terintegrasi.

## 🌟 Fitur Utama

- ✨ Pembuatan undangan pernikahan digital
- 🎨 2 Template desain elegan (Elegant & Rustic)
- 📱 Responsif di semua perangkat
- 📊 Dashboard admin untuk manajemen undangan
- ✉️ Sistem RSVP digital
- 📊 Statistik kehadiran tamu
- 🔒 Sistem autentikasi admin

## 🛠️ Teknologi yang Digunakan

- PHP 7.4+
- MySQL Database
- Tailwind CSS
- Font Awesome Icons
- Google Fonts
- Modern JavaScript

## 📋 Persyaratan Sistem

- Web Server (Apache/Nginx)
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- mod_rewrite diaktifkan (untuk Apache)

## 🚀 Instalasi

1. **Persiapan Database**
   ```sql
   # Import struktur database
   mysql -u username -p wedding_invitation < wedding_invitation.sql
   ```

2. **Konfigurasi Database**
   - Buka file `db.php`
   - Sesuaikan kredensial database:
     ```php
     $db_host = 'localhost';
     $db_user = 'your_username';
     $db_pass = 'your_password';
     $db_name = 'wedding_invitation';
     ```

3. **Pengaturan Web Server**
   - Pastikan folder project dapat diakses oleh web server
   - Atur permission file yang sesuai
   - Aktifkan mod_rewrite jika menggunakan Apache

## 👥 Akses Admin

**Kredensial default:**
- Username: `admin`
- Password: `admin123`

⚠️ **Penting:** Ganti password default setelah instalasi!

## 📱 Penggunaan

### Untuk Pasangan Pengantin:

1. Kunjungi halaman utama
2. Isi formulir data pernikahan:
   - Nama pasangan
   - Tanggal & lokasi
   - URL foto
   - Pilih template
3. Submit form untuk mendapatkan link undangan
4. Bagikan link undangan kepada tamu

### Untuk Tamu:

1. Buka link undangan yang diterima
2. Lihat detail acara pernikahan
3. Isi form RSVP untuk konfirmasi kehadiran
4. Submit respons

### Untuk Admin:

1. Login ke dashboard admin
2. Kelola semua undangan
3. Lihat statistik RSVP
4. Monitor konfirmasi kehadiran
5. Export data jika diperlukan

## 🎨 Template Undangan

### 1. Elegant Template
- Desain minimalis dan elegan
- Warna dominan pink dan putih
- Animasi halus
- Font Playfair Display

### 2. Rustic Template
- Tema rustic yang hangat
- Warna earth tone
- Elemen dekoratif natural
- Font Montserrat

## 📊 Fitur Dashboard Admin

- Overview statistik undangan
- Daftar semua undangan
- Detail RSVP per undangan
- Statistik kehadiran
- Manajemen template

## 🔒 Keamanan

- Input sanitization
- Prepared SQL statements
- Session-based authentication
- Validasi form
- XSS protection

## 📝 Catatan Pengembangan

- Sistem dibangun dengan prinsip clean code
- Menggunakan pendekatan modular
- Responsif untuk semua ukuran layar
- Optimized untuk performa

## 🔄 Update & Maintenance

1. **Backup Database**
   ```bash
   mysqldump -u username -p wedding_invitation > backup.sql
   ```

2. **Update Sistem**
   - Backup file konfigurasi
   - Update source code
   - Test di lingkungan development
   - Deploy ke production

## 🤝 Kontribusi

Kontribusi selalu welcome! Berikut langkah-langkahnya:

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## 📜 Lisensi

Project ini dilisensikan di bawah MIT License - lihat file LICENSE untuk detail.

## 📞 Dukungan

Jika Anda menemukan bug atau memiliki saran:
- Buat issue di repository
- Email: support@weddingdigital.com
- Discord: [Link Server Discord]

## 🙏 Credit

- Tailwind CSS untuk styling
- Font Awesome untuk icons
- Google Fonts untuk typography
- Pexels untuk sample images

---

Dibuat dengan ❤️ untuk memudahkan pembuatan undangan pernikahan digital
