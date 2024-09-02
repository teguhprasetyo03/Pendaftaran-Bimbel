<?php
include "../koneksi.php";

$kdtk = addslashes($_POST['kdtk']);
$namatk = addslashes($_POST['namatk']);
$alamat_tk = addslashes($_POST['alamat_tk']);

// Periksa apakah data dengan kdtk tersebut sudah ada di database
$query = "SELECT * FROM tk WHERE kdtk = '$kdtk'";
$exec = mysqli_query($mysqli, $query);

if (!$exec) {
    // Jika query gagal, tampilkan pesan kesalahan
    die('Query Error: ' . mysqli_error($mysqli));
}

// Jika data tidak ditemukan, lakukan insert, jika ada lakukan update
if (mysqli_num_rows($exec) == 0) {
    $query = "INSERT INTO tk (kdtk, namatk, alamat_tk) VALUES ('$kdtk', '$namatk', '$alamat_tk')";
} else {
    $query = "UPDATE tk SET namatk = '$namatk', alamat_tk = '$alamat_tk' WHERE kdtk = '$kdtk'";
}

// Eksekusi query insert atau update
if (mysqli_query($mysqli, $query)) {
    header("Location: ./?p=tk&code=1"); // Redirect jika sukses
} else {
    header("Location: ./?p=tk&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>
