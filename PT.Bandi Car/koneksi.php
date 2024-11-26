<?php
// Pengaturan koneksi ke database
$host = 'localhost'; // Host MySQL (biasanya localhost)
$username = 'root';  // Username MySQL (untuk XAMPP, default: root)
$password = '';      // Password MySQL (untuk XAMPP, default: kosong)
$dbname = 'pt_bendi_car'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
