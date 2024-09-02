<?php
include "../koneksi.php";

$kdagama = addslashes($_POST['kdagama']);
$nmagama = addslashes($_POST['nmagama']);

// Periksa apakah data agama dengan kdagama tersebut sudah ada
$query = "SELECT * FROM agama WHERE kdagama = '$kdagama'";
$exec = mysqli_query($mysqli, $query);

if (!$exec) {
    // Jika query gagal, tampilkan pesan kesalahan
    die('Query Error: ' . mysqli_error($mysqli));
}

// Jika data tidak ditemukan, lakukan insert, jika ada lakukan update
if (mysqli_num_rows($exec) == 0) {
    $query = "INSERT INTO agama (kdagama, nmagama) VALUES ('$kdagama', '$nmagama')";
} else {
    $query = "UPDATE agama SET nmagama = '$nmagama' WHERE kdagama = '$kdagama'";
}

// Eksekusi query insert atau update
if (mysqli_query($mysqli, $query)) {
    header("Location: ./?p=agama&code=1");
} else {
    header("Location: ./?p=agama&code=2");
}

mysqli_close($mysqli); // Tutup koneksi database
?>
