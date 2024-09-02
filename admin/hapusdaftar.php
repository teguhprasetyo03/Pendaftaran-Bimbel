<?php
include "../koneksi.php";

// Pastikan koneksi database berhasil
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil dan bersihkan input
$kdpendaftar = $_GET['kdpendaftar'];

// Siapkan statement untuk menghapus data
$stmt = $mysqli->prepare("DELETE FROM pendaftar WHERE kdpendaftar = ?");
$stmt->bind_param("s", $kdpendaftar);

// Eksekusi statement
if ($stmt->execute()) {
    // Redirect ke halaman utama dengan kode sukses
    header("Location: ./?p=pendaftar&code=3");
} else {
    // Redirect ke halaman utama dengan kode error
    header("Location: ./?p=pendaftar&code=2");
}

// Tutup statement dan koneksi
$stmt->close();
$mysqli->close();
?>
