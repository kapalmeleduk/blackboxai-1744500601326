-- Create the database
CREATE DATABASE IF NOT EXISTS wedding_invitation;
USE wedding_invitation;

-- Create undangan table
CREATE TABLE IF NOT EXISTS undangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pria VARCHAR(100) NOT NULL,
    nama_ayah_pria VARCHAR(100) NOT NULL,
    nama_ibu_pria VARCHAR(100) NOT NULL,
    nama_wanita VARCHAR(100) NOT NULL,
    nama_ayah_wanita VARCHAR(100) NOT NULL,
    nama_ibu_wanita VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    ceremony_time TIME NOT NULL,
    reception_time TIME NOT NULL,
    dinner_time TIME,
    lokasi TEXT NOT NULL,
    foto TEXT NOT NULL,
    template VARCHAR(50) NOT NULL,
    kode_unik VARCHAR(8) NOT NULL UNIQUE,
    quote_text TEXT,
    quote_author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create rsvp table
CREATE TABLE IF NOT EXISTS rsvp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    nama_tamu VARCHAR(100) NOT NULL,
    jumlah_hadir INT NOT NULL,
    pesan TEXT,
    status_kehadiran ENUM('hadir', 'tidak_hadir') NOT NULL,
    waktu_submit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create love story table
CREATE TABLE IF NOT EXISTS love_story (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    judul VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    tanggal DATE,
    icon VARCHAR(50),
    urutan INT NOT NULL,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create gallery table
CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    undangan_id INT NOT NULL,
    image_url TEXT NOT NULL,
    caption VARCHAR(255),
    urutan INT NOT NULL,
    FOREIGN KEY (undangan_id) REFERENCES undangan(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create admin table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    nama_lengkap VARCHAR(100) NOT NULL,
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add indexes for better performance
CREATE INDEX idx_kode_unik ON undangan(kode_unik);
CREATE INDEX idx_undangan_id ON rsvp(undangan_id);
CREATE INDEX idx_status_kehadiran ON rsvp(status_kehadiran);
CREATE INDEX idx_undangan_id_love ON love_story(undangan_id);
CREATE INDEX idx_undangan_id_gallery ON gallery(undangan_id);

-- Insert default admin account
INSERT INTO admin (username, password, email, nama_lengkap) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com', 'Administrator');
-- Default password is: admin123 (hashed with bcrypt)
