<?php
include "../koneksi.php";

// Pastikan koneksi database berhasil
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

$kdtk = $_GET['kdtk'];

// Siapkan statement untuk mencegah SQL injection
$stmt = $mysqli->prepare("DELETE FROM tk WHERE kdtk = ?");
$stmt->bind_param("s", $kdtk);

// Eksekusi statement
if ($stmt->execute()) {
    // Redirect ke halaman utama dengan kode sukses
    header("Location: ./?p=tk&code=3");
} else {
    // Redirect ke halaman utama dengan kode error
    header("Location: ./?p=tk&code=2");
}

// Tutup statement dan koneksi
$stmt->close();
$mysqli->close();
?>
