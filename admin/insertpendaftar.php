<?php
include "../koneksi.php";

// Pastikan koneksi database berhasil
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil dan bersihkan input
$kdpendaftar = $_POST['kdpendaftar'];
$nama = $_POST['nama'];

// Siapkan statement untuk pengecekan data
$stmt = $mysqli->prepare("SELECT * FROM pendaftar WHERE kdpendaftar = ?");
$stmt->bind_param("s", $kdpendaftar);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah data sudah ada
if ($result->num_rows == 0) {
    // Data tidak ditemukan, lakukan update
    $stmt = $mysqli->prepare("UPDATE pendaftar SET nama = ? WHERE kdpendaftar = ?");
    $stmt->bind_param("ss", $nama, $kdpendaftar);
    
    if ($stmt->execute()) {
        // Redirect ke halaman utama dengan kode sukses
        header("Location: ./?p=pendaftar&code=1");
    } else {
        // Redirect ke halaman utama dengan kode error
        header("Location: ./?p=pendaftar&code=3");
    }
} else {
    // Data ditemukan, redirect dengan kode error
    header("Location: ./?p=pendaftar&code=2");
}

// Tutup statement dan koneksi
$stmt->close();
$mysqli->close();
?>
