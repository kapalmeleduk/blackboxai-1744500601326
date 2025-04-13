-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    token_expires DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Invitations table
CREATE TABLE invitations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    template_name VARCHAR(50) NOT NULL,
    nama_pria VARCHAR(255) NOT NULL,
    nama_wanita VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    waktu_akad TIME NOT NULL,
    waktu_resepsi TIME NOT NULL,
    lokasi TEXT NOT NULL,
    foto VARCHAR(255) NOT NULL,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- RSVP table
CREATE TABLE rsvp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invitation_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    attendance ENUM('yes', 'no', 'maybe') NOT NULL,
    number_of_guests INT DEFAULT 1,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invitation_id) REFERENCES invitations(id) ON DELETE CASCADE
);

-- Digital gifts table
CREATE TABLE digital_gifts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invitation_id INT NOT NULL,
    sender_name VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    message TEXT,
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (invitation_id) REFERENCES invitations(id) ON DELETE CASCADE
);

-- Comments table
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invitation_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invitation_id) REFERENCES invitations(id) ON DELETE CASCADE
);

-- Gallery table
CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invitation_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    caption TEXT,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invitation_id) REFERENCES invitations(id) ON DELETE CASCADE
);

-- Music table
CREATE TABLE music (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invitation_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    file_url VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invitation_id) REFERENCES invitations(id) ON DELETE CASCADE
);
