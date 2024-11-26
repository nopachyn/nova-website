<?php
include 'koneksi.php'; // Memasukkan file koneksi.php untuk koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirimkan melalui form
    $alamat = $_POST['alamat'];
    $nama = $_POST['nama'];
    $noKTP = $_POST['NoKTP'];
    $noTelp = $_POST['NoTelp'];
    $merek = $_POST['pilihan'];
    $tglpengembalian = $_POST['tglpengembalian'];

    // Validasi jika ada data yang kosong
    if (empty($alamat) || empty($nama) || empty($noKTP) || empty($noTelp) || empty($merek) || empty($tglpengembalian)) {
        echo "Semua kolom wajib diisi!";
        exit; // Jika ada kolom kosong, proses dihentikan
    }

    // Menyusun query INSERT untuk memasukkan data ke dalam tabel penyewaan
    $query = "INSERT INTO penyewaan (alamat, nama, no_ktp, no_telp, merek, tanggal_pengembalian) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Persiapkan query
    $stmt = $conn->prepare($query);

    // Binding parameter untuk query (sesuaikan dengan urutan data)
    $stmt->bind_param("ssssss", $alamat, $nama, $noKTP, $noTelp, $merek, $tglpengembalian);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, tampilkan pesan sukses
        echo "Data berhasil disimpan. <a href='form.php'>Kembali</a>";
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    // Jika bukan metode POST, tampilkan pesan error
    echo "Metode pengiriman tidak valid.";
}
?>
