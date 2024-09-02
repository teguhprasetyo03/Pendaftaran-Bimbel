<?php
include "../koneksi.php";

$kdpekerjaan = addslashes($_POST['kdpekerjaan']);
$nmpekerjaan = addslashes($_POST['nmpekerjaan']);

// Periksa apakah data dengan kdpekerjaan tersebut sudah ada di database
$query = "SELECT * FROM pekerjaan WHERE kdpekerjaan = '$kdpekerjaan'";
$exec = mysqli_query($mysqli, $query);

if (!$exec) {
    // Jika query gagal, tampilkan pesan kesalahan
    die('Query Error: ' . mysqli_error($mysqli));
}

// Jika data tidak ditemukan, lakukan insert, jika ada lakukan update
if (mysqli_num_rows($exec) == 0) {
    $query = "INSERT INTO pekerjaan (kdpekerjaan, nmpekerjaan) VALUES ('$kdpekerjaan', '$nmpekerjaan')";
} else {
    $query = "UPDATE pekerjaan SET nmpekerjaan = '$nmpekerjaan' WHERE kdpekerjaan = '$kdpekerjaan'";
}

// Eksekusi query insert atau update
if (mysqli_query($mysqli, $query)) {
    header("Location: ./?p=pekerjaan&code=1"); // Redirect jika sukses
} else {
    header("Location: ./?p=pekerjaan&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>
