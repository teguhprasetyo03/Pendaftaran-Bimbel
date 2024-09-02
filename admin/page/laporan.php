<ol class='breadcrumb'>
    <li><a href='./'>Home</a></li>
    <li class='active'>Laporan</li>
</ol>
<!-- end:breadcrumb -->

<form id="cetak" action="fpdf/examples/print.php" method="post">
    <input type="hidden" name="isi" id="isi" value="">
    <input type="hidden" name="namafile" value="hakakses">
</form>

<table class="table table-striped">
    <tr>
        <th width="5%">No.</th>
        <th>Laporan</th>
        <th></th>
    </tr>
    <?php
    include "../koneksi.php";
    
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to prevent SQL injection
    if (!isset($_GET['data'])) {
        $stmt = $mysqli->prepare("SELECT * FROM pendaftar");
    } else {
        $data = trim($_GET['data']);
        $stmt = $mysqli->prepare("SELECT * FROM pendaftar WHERE kdpendaftar LIKE ? OR nama LIKE ?");
        $searchTerm = "%{$data}%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $no = 0;
    while ($r = $result->fetch_array(MYSQLI_NUM)) {
        $no++;
    ?>
    <tr>
        <td width="5%"><?php echo $no; ?></td>
        <td><span class="data-1-<?php echo $no; ?>"><?php echo $r[1]; ?></span></td>
        <td>
            <a href="laporan/cetakformulir.php?kdpendaftar=<?php echo $r[0]; ?>">
                <button type="button" class="btn btn-primary">
                    <span class='fa fa-print'></span> Cetak Formulir Pendaftar
                </button>
            </a>
            &nbsp;
            <button class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $r[0]; ?>">Detail</button>

            <div class="modal fade bs-example-modal-lg<?php echo $r[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Data Pendaftar</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped" width="100%">
                                <tr>
                                    <th width="25%">Nama</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-0-<?php echo $r[0]; ?>"><?php echo $r[1]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Jenis Kelamin</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-1-<?php echo $r[0]; ?>"><?php echo $r[2]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Agama</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-2-<?php echo $r[0]; ?>"><?php echo $r[3]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Tempat Lahir</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-3-<?php echo $r[0]; ?>"><?php echo $r[4]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Tanggal Lahir</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-4-<?php echo $r[0]; ?>"><?php echo $r[5]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Asal Sekolah</th>
                                    <td width="1%">:</td>
                                    <td>Rp. <?php echo $r[16]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Alamat</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-5-<?php echo $r[0]; ?>"><?php echo $r[6]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Status Anak</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-6-<?php echo $r[0]; ?>"><?php echo $r[7]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Nama Ayah</th>
                                    <td width="1%">:</td>
                                    <td><span class="data-7-<?php echo $r[0]; ?>"><?php echo $r[8]; ?></span></td>
                                </tr>
                                <tr>
                                    <th width="25%">Pendidikan Ayah</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[9]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Pekerjaan Ayah</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[10]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Penghasilan Ayah</th>
                                    <td width="1%">:</td>
                                    <td>Rp. <?php echo $r[11]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Nama Ibu</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[12]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Pendidikan Ibu</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[13]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">Pekerjaan Ibu</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[14]; ?></td>
                                </tr>
                                <tr>
                                    <th width="25%">No Hp</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $r[15]; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
