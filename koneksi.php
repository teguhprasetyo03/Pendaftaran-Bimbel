<?php
// koneksi.php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ta_pendaftaran";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
