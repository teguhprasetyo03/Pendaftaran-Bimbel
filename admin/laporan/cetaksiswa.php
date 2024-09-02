<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pendaftaran Calon Siswa Homeschooling Primagama</title>
    <style>
        .style1 {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 100px;
        }
        .alamat {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body onLoad="window.print();">
<?php
include '../../koneksi.php'; // Adjust the path as necessary

if (!isset($mysqli)) {
    die("Connection failed: Database connection variable \$mysqli is not set.");
}

// Query to fetch data
$query = "SELECT * FROM pendaftar";
$sql = $mysqli->query($query);

if (!$sql) {
    die("Query failed: " . $mysqli->error);
}
?>
 <div class="header">
        <img src="../../logoh.png" alt="Logo Primagama" class="logo">
        <p><strong>LAPORAN DATA PENDAFTARAN CALON SISWA HOMESCHOOLING PRIMAGAMA</strong></p>
        <p class="alamat">Jalan Boulevar Selatan, Marga Mulya, Bekasi Utara, Kota Bekasi, Jawa
        Barat 17141</p>
    </div>
<!-- <p align="center"><strong>LAPORAN DATA PENDAFTARAN CALON SISWA HOMESCHOOLING PRIMAGAMA</strong></p> -->
<table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
    <tr>
        <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Pendaftaran</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Nama Siswa</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Jenis Kelamin</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Agama</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Tempat Lahir</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Tanggal Lahir</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Alamat</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Nama Ayah</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Pendidikan</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Pekerjaan</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Penghasilan</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Nama Ibu</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Pendidikan</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Pekerjaan</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">No. Hp</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Kode Sekolah</th>
        <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Status</th>
    </tr>
    <?php
    $no = 1;
    while ($data = $sql->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data['kdpendaftar']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jenkel']; ?></td>
        <td><?php echo $data['kdagama']; ?></td>
        <td><?php echo $data['tpt_lahir']; ?></td>
        <td><?php echo $data['tgl_lahir']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['nmayah']; ?></td>
        <td><?php echo $data['kdpendidikana']; ?></td>
        <td><?php echo $data['kdpekerjaana']; ?></td>
        <td><?php echo $data['penghasilanayah']; ?></td>
        <td><?php echo $data['nmibu']; ?></td>
        <td><?php echo $data['kdpendidikani']; ?></td>
        <td><?php echo $data['kdpekerjaani']; ?></td>
        <td><?php echo $data['nohp']; ?></td>
        <td><?php echo $data['kdtk']; ?></td>
        <td><?php echo $data['statusdaftar']; ?></td>
    </tr>
    <?php
        $no++;
    }
    ?>
</table>

<br><br>


<div align="right" style="margin-top: 50px;">
<p><?php function tanggal_indonesia($tanggal){
    $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $split = explode('-', $tanggal);
    $tgl_indo = $hari[date('N', strtotime($tanggal))] .', ' . $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    return $tgl_indo;
}

echo "<p>Bekasi, " . tanggal_indonesia(date('Y-m-d')) . "</p>"; ?></p>
    <br><br><br>
    <p><strong>(Purdie Candra)</strong></p>
    <p>Head Of Primagama Bekasi</p>
</body>
</html>
