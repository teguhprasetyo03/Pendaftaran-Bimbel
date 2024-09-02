<?php
include "../koneksi.php";

$kdpendidikan = addslashes($_POST['kdpendidikan']);
$nmpendidikan = addslashes($_POST['nmpendidikan']);

// Periksa apakah data dengan kdpendidikan tersebut sudah ada di database
$query = "SELECT * FROM pendidikan WHERE kdpendidikan = '$kdpendidikan'";
$exec = mysqli_query($mysqli, $query);

if (!$exec) {
    // Jika query gagal, tampilkan pesan kesalahan
    die('Query Error: ' . mysqli_error($mysqli));
}

// Jika data tidak ditemukan, lakukan insert, jika ada lakukan update
if (mysqli_num_rows($exec) == 0) {
    $query = "INSERT INTO pendidikan (kdpendidikan, nmpendidikan) VALUES ('$kdpendidikan', '$nmpendidikan')";
} else {
    $query = "UPDATE pendidikan SET nmpendidikan = '$nmpendidikan' WHERE kdpendidikan = '$kdpendidikan'";
}

// Eksekusi query insert atau update
if (mysqli_query($mysqli, $query)) {
    header("Location: ./?p=pendidikan&code=1"); // Redirect jika sukses
} else {
    header("Location: ./?p=pendidikan&code=2"); // Redirect jika gagal
}

// Menutup koneksi database
mysqli_close($mysqli);
?>
