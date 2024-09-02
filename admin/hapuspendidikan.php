<?php
include "../koneksi.php";

// Mengambil parameter kdpendidikan dari URL dan melindungi dari SQL injection
$kdpendidikan = addslashes($_GET['kdpendidikan']);

// Membuat query untuk menghapus data berdasarkan kdpendidikan
$query = "DELETE FROM pendidikan WHERE kdpendidikan = '$kdpendidikan'";

// Mengeksekusi query
$exec = mysqli_query($mysqli, $query);

if ($exec) {
    header("Location: ./?p=pendidikan&code=3"); // Redirect jika sukses
} else {
    header("Location: ./?p=pendidikan&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>
