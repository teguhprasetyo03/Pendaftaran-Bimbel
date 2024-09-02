<?php
include "../koneksi.php";

// Mengambil parameter kdpekerjaan dari URL dan melindungi dari SQL injection
$kdpekerjaan = addslashes($_GET['kdpekerjaan']);

// Membuat query untuk menghapus data berdasarkan kdpekerjaan
$query = "DELETE FROM pekerjaan WHERE kdpekerjaan = '$kdpekerjaan'";

// Mengeksekusi query
$exec = mysqli_query($mysqli, $query);

if ($exec) {
    header("Location: ./?p=pekerjaan&code=3"); // Redirect jika sukses
} else {
    header("Location: ./?p=pekerjaan&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>
