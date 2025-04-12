# Struktur File Platform Undangan Pernikahan Digital

```
wedding-digital/
│
├── assets/
│   ├── css/
│   │   ├── common/
│   │   │   ├── base.css        # Reset dan styles dasar
│   │   │   ├── utilities.css   # Utility classes
│   │   │   └── animations.css  # Shared animations
│   │   │
│   │   ├── components/
│   │   │   ├── gallery.css     # Styles untuk gallery
│   │   │   ├── countdown.css   # Styles untuk countdown
│   │   │   └── forms.css       # Styles untuk forms
│   │   │
│   │   ├── templates/
│   │   │   ├── elegant.css     # Styles tema elegant
│   │   │   ├── rustic.css      # Styles tema rustic
│   │   │   └── minimalist.css  # Styles tema minimalist
│   │   │
│   │   └── README.md          # Dokumentasi CSS
│   │
│   └── images/               # Folder untuk gambar default template
│
├── templates/               # Template undangan
│   ├── elegant.php         # Template dengan tema elegant
│   ├── rustic.php          # Template dengan tema rustic
│   └── minimalist.php      # Template dengan tema minimalist
│
├── db.php                  # Konfigurasi koneksi database
├── header.php             # Header layout yang digunakan di semua halaman
├── footer.php            # Footer layout yang digunakan di semua halaman
│
├── index.php             # Halaman utama/landing page
├── create_invitation.php # Proses pembuatan undangan baru
├── invitation.php       # Halaman display undangan
├── process_rsvp.php    # Proses form RSVP
│
├── admin_login.php     # Halaman login admin
├── admin_dashboard.php # Dashboard admin
├── view_rsvp.php      # Halaman detail RSVP per undangan
├── logout.php         # Proses logout admin
│
├── 404.php           # Halaman error 404 (Not Found)
├── 403.php           # Halaman error 403 (Forbidden)
│
├── install.php       # Wizard instalasi platform
├── check_setup.php   # Pengecekan sistem dan requirement
│
├── wedding_invitation.sql  # File SQL struktur database
├── .htaccess              # Konfigurasi Apache dan keamanan
├── README.md              # Dokumentasi project
└── STRUCTURE.md           # Dokumentasi struktur file (file ini)
```

## Penjelasan Struktur

### 1. Assets
- `assets/css/`: Semua file CSS terorganisir dalam struktur modular
  - `common/`: Styles dasar dan utility classes
  - `components/`: Styles untuk komponen reusable
  - `templates/`: Styles khusus untuk setiap template
- `assets/images/`: Gambar default untuk template

### 2. Templates
Berisi 3 template undangan dengan gaya berbeda:
- `elegant.php`: Design modern dengan warna dominan pink
- `rustic.php`: Design vintage dengan warna earth tone
- `minimalist.php`: Design clean dan minimalis dengan warna monokrom

### 3. File Konfigurasi
- `db.php`: Konfigurasi database
- `.htaccess`: Konfigurasi server dan keamanan
- `header.php` & `footer.php`: Layout universal

### 4. File Utama
- `index.php`: Landing page
- `create_invitation.php`: Pembuatan undangan
- `invitation.php`: Display undangan
- `process_rsvp.php`: Proses RSVP

### 5. Admin Section
- `admin_login.php`: Form login admin
- `admin_dashboard.php`: Dashboard management
- `view_rsvp.php`: Detail RSVP
- `logout.php`: Proses logout

### 6. Error Pages
- `404.php`: Halaman Not Found
- `403.php`: Halaman Forbidden Access

### 7. Setup & Installation
- `install.php`: Wizard instalasi
- `check_setup.php`: Validasi sistem
- `wedding_invitation.sql`: Struktur database

### 8. Documentation
- `README.md`: Panduan penggunaan
- `STRUCTURE.md`: Dokumentasi struktur
- `assets/css/README.md`: Dokumentasi CSS

## Penggunaan CSS

### 1. Common Styles
- Base styles dan reset
- Utility classes untuk layout
- Animasi yang digunakan di semua template

### 2. Component Styles
- Gallery component
- Countdown timer
- Form elements

### 3. Template Styles
Setiap template memiliki:
- Variables untuk warna dan spacing
- Specific layout styles
- Custom animations
- Responsive design

## Cara Implementasi

1. Setup di XAMPP:
   ```
   C:/xampp/htdocs/wedding-digital/
   ```

2. Database:
   - Buat database 'wedding_invitation'
   - Import wedding_invitation.sql

3. Instalasi:
   - Buka http://localhost/wedding-digital/install.php
   - Ikuti wizard instalasi

4. Akses:
   - Frontend: http://localhost/wedding-digital/
   - Admin: http://localhost/wedding-digital/admin_login.php
     - Username: admin
     - Password: admin123

## Penggunaan Template

### 1. Elegant Template
Tema modern dengan:
- Warna dominan pink
- Animasi halus
- Ornamen elegan
- Font Playfair Display

### 2. Rustic Template
Tema vintage dengan:
- Warna earth tone
- Tekstur kayu
- Frame rustic
- Font kombinasi serif & sans-serif

### 3. Minimalist Template
Tema clean dengan:
- Warna monokrom
- Whitespace optimal
- Tipografi kuat
- Layout grid modern

## Maintenance

1. CSS Updates:
   - Edit file di folder sesuai komponennya
   - Gunakan CSS variables untuk konsistensi
   - Test responsiveness

2. Template Updates:
   - Edit template PHP sesuai temanya
   - Update CSS terkait di folder templates
   - Test di berbagai device

## Best Practices

1. CSS:
   - Gunakan struktur modular
   - Manfaatkan CSS variables
   - Ikuti BEM naming convention
   - Prioritaskan performance

2. Template:
   - Maintain konsistensi design
   - Optimasi gambar
   - Test cross-browser
   - Validasi HTML/CSS
