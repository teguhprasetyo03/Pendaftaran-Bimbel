<!DOCTYPE html>
<html>
<head>
<title>Formulir Pendaftaran Siswa</title>
<style>
  .logo-container {
    text-align: center;
    margin-bottom: 20px;
  }
</style>
</head>
<body onload="window.print()">
<?php
$kdpendaftar = addslashes($_GET['kdpendaftar']);

// 1. Modernized Database Connection (assuming you're using MySQLi)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../koneksi.php"; // Your connection file

if (!isset($mysqli)) {
  die("Connection failed: Database connection variable \$mysqli is not set.");
}

$stmt = $mysqli->prepare("SELECT * FROM pendaftar WHERE kdpendaftar = ?");
$stmt->bind_param("s", $kdpendaftar); 
$stmt->execute();
$result = $stmt->get_result();
$r = $result->fetch_assoc();
$stmt->close();
$mysqli->close(); // Close the connection when done

?>

<table width="100%" border="0">
  <tr>
  <div class="logo-container">
  <img src="../../logoh.png" alt="Logo Primagama" class="logo" width="100">
</div>
    <th>FORMULIR PENDAFTARAN SISWA <br> Home Schooling Primagama</th>
  </tr>
</table>
<hr>
<img src="a.jpg" alt="Image Description"> 
<table class="table table-striped" width="100%">
    <?php 
        $fields = array(
            "Kode Pendaftaran" => "kdpendaftar", 
            "Nama" => "nama",
            "Jenis Kelamin" => "jenkel",
            "Tempat Lahir" => "tpt_lahir",
            "Tanggal Lahir" => "tgl_lahir",
            "Alamat" => "alamat",
            "Status Anak" => "statusanak",
            "Nama Ayah" => "nmayah",
             "Nama Ibu" => "nmibu", 
             "No Telepon" => "nohp", 
        );

        foreach ($fields as $label => $field) {
            echo "<tr>";
            echo "<th width='25%'><div align='left'>$label</div></th>";
            echo "<td width='10%'> : </td>";
            echo "<td>" . (isset($r[$field]) ? htmlspecialchars($r[$field]) : "Data tidak tersedia") . "</td>"; 
            echo "</tr>";
        }
    ?>

</table>

<br>
<br>
<p align="right">Mengetahui </p>
<br>
<br>
<br>
<br>
<p align="right">Warih Prasetyono </p>
<p align="right">Kepala Sekolah </p>
<p align="right">NIP : 2031523266</p>

<p>*) Cetaklah Formulir ini Dan Tempelkan Foto Anda <br>
*) Formulir di cetak Rangkap 2 <br>
*) Pengumuman Seleksi Pendaftaran Akan di Umumkan Melalui Website Resmi </p>

</body>
</html>
