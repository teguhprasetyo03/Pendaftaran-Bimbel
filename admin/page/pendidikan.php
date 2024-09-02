<ol class='breadcrumb'>
    <li><a href='./'>Home</a></li>
    <li class='active'>Pendidikan</li>
</ol>
<!-- end:breadcrumb -->

<div class='row' id='home-content'>
    <div class='col-lg-12'>
        <script type="text/javascript">
            $(document).ready(function() {
                // Event handler for 'Tambah' button
                $("body").on("click", "#tambah", function(e) {
                    $('#area-loading').html('');
                    $("#kdpendidikan").removeAttr('readonly').val('');
                    $('#nmpendidikan').val('');
                    $(".edit-dialog").modal('toggle');
                });

                // Event handler for 'Hapus' button
                $("body").on("click", ".hapus", function(e) {
                    var clickedID = this.id.split('-');
                    var DbNumberID = ".data-0-" + clickedID[1];
                    $(".kdpendidikan").html($(DbNumberID).html());
                    $('.dialog-hapus').modal('toggle');
                    $("#konf").attr("href", "hapuspendidikan.php?kdpendidikan=" + $(DbNumberID).html());
                });

                // Event handler for 'Edit' button
                $("body").on("click", ".edit", function(e) {
                    var clickedID = this.id.split('-');
                    var DbNumberID = clickedID[1];
                    var kelas1 = ".data-0-" + DbNumberID;
                    var kelas2 = ".data-1-" + DbNumberID;
                    var kdpendidikan = $(kelas1).html();
                    var nmpendidikan = $(kelas2).html();
                    $("#kdpendidikan").val(kdpendidikan).attr("readonly", "true");
                    $("#nmpendidikan").val(nmpendidikan);
                    $('.edit-dialog').modal('toggle');
                });
            });
        </script>

        <form id="cetak" action="fpdf/examples/print.php" method="post">
            <input type="hidden" name="isi" id="isi" value="">
            <input type="hidden" name="namafile" value="pendidikan">
        </form>

        <!-- Modal untuk Hapus Data -->
        <div class="modal fade bs-example-modal-lg dialog-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin menghapus data dengan kode pendidikan = <span class='kdpendidikan'></span>?
                    </div>
                    <div class="modal-footer">
                        <a id="konf" href=""><button type="button" class="btn btn-danger" id="simpan">Ya</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button untuk Tambah Data -->
        <button type="button" id="tambah" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah</button><br>

        <!-- Modal untuk Edit dan Tambah Data -->
        <div class="modal fade bs-example-modal-lg edit-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Data Pendidikan</h4>
                        <div class="area-loading"></div>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form" action="insertpendidikan.php">
                            <table class="table table-striped" width="100%">
                                <tr>
                                    <th width="25%">Kode Pendidikan</th>
                                    <td width="1%"> : </td>
                                    <td><input id="kdpendidikan" name="kdpendidikan" placeholder="Kode" class="form-control" type="text" required></td>
                                </tr>
                                <tr>
                                    <th width="25%">Nama Pendidikan</th>
                                    <td width="1%"> : </td>
                                    <td><input id="nmpendidikan" name="nmpendidikan" placeholder="Nama" class="form-control" type="text" required></td>
                                </tr>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Error handling for success or failure messages
        if (isset($_GET['code'])) {
            if ($_GET['code'] == 1) {
                echo "<h3 style='color:green'>Data pendidikan berhasil disimpan</h3>";
            } elseif ($_GET['code'] == 2) {
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            } elseif ($_GET['code'] == 3) {
                echo "<h3 style='color:blue'>Data pendidikan berhasil dihapus</h3>";
            }
        }

        // Database connection and query execution
        include "../koneksi.php";
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $exec = null;
        if (!isset($_GET['data'])) {
            $exec = mysqli_query($mysqli, "SELECT * FROM pendidikan");
        } else {
            $data = trim(mysqli_real_escape_string($mysqli, $_GET['data']));
            $exec = mysqli_query($mysqli, "SELECT * FROM pendidikan WHERE kdpendidikan LIKE '%" . $data . "%' OR nmpendidikan LIKE '%" . $data . "%'");
        }

        if (!$exec) {
            die("Query error: " . mysqli_error($mysqli));
        }
        ?>

        <table class="table table-striped">
            <tr>
                <th width="5%">No.</th>
                <th width="20%">Kode Pendidikan</th>
                <th>Nama Pendidikan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 0;
            while ($r = mysqli_fetch_array($exec)) {
                $no++;
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><span class="data-0-<?php echo $no; ?>"><?php echo $r['kdpendidikan']; ?></span></td>
                <td><span class="data-1-<?php echo $no; ?>"><?php echo $r['nmpendidikan']; ?></span></td>
                <td>
                    <a class="edit" id="edit-<?php echo $no; ?>"><button type="button" class="btn btn-warning"><span class='fa fa-edit'></span> Edit</button></a> &nbsp;
                    <a class="hapus" id="hapus-<?php echo $no; ?>"><button type="button" class="btn btn-danger"><span class='fa fa-trash'></span> Hapus</button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
