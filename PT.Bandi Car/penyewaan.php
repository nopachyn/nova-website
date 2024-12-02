<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat = $_POST['alamat'];
    $nama = $_POST['nama'];
    $noKTP = $_POST['NoKTP'];
    $noTelp = $_POST['NoTelp'];
    $merek = $_POST['pilihan']; 
    $tglpengembalian = $_POST['tglpengembalian'];

    if (empty($alamat) || empty($nama) || empty($noKTP) || empty($noTelp) || empty($merek) || empty($tglpengembalian)) {
        echo "Semua kolom wajib diisi!";
        exit;
    }

    $query = "INSERT INTO penyewaan (Alamat, Nama, no_ktp, no_telp, merek, tgl_pengembalian) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("ssssss", $alamat, $nama, $noKTP, $noTelp, $merek, $tglpengembalian);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan. <a href='penyewaan.html'>Kembali</a>";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode pengiriman tidak valid.";
}
?>