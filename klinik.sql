CREATE DATABASE klinik;

USE klinik;


CREATE TABLE wilayah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    deskripsi varchar(255)
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE pegawai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    no_hp VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE tindakan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    deskripsi varchar(255),
    biaya DECIMAL(10, 2) NOT NULL
);


CREATE TABLE obat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL
);


CREATE TABLE pasien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat TEXT,
    no_telp VARCHAR(15),
    wilayah_id INT NOT NULL,
    FOREIGN KEY (wilayah_id) REFERENCES wilayah(id) ON DELETE CASCADE
);


CREATE TABLE tagihan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pasien_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM('belum dibayar', 'dibayar') NOT NULL,
    tanggal DATE NOT NULL,
    obat_id INT NOT NULL,
    jumlah INT NOT NULL,
    FOREIGN KEY (obat_id) REFERENCES obat(id) ON DELETE CASCADE,
    FOREIGN KEY (pasien_id) REFERENCES pasien(id) ON DELETE CASCADE
);