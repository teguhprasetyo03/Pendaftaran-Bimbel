<?php
include "../koneksi.php";

// Mengambil parameter kdagama dari URL dan melindungi dari SQL injection
$kdagama = addslashes($_GET['kdagama']);

// Membuat query untuk menghapus data berdasarkan kdagama
$query = "DELETE FROM agama WHERE kdagama = '$kdagama'";

// Mengeksekusi query
$exec = mysqli_query($mysqli, $query);

// Memeriksa apakah query berhasil
if ($exec) {
    header("Location: ./?p=agama&code=3"); // Redirect jika sukses
} else {
    header("Location: ./?p=agama&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>