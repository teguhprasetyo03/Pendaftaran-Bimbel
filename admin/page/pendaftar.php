<ol class='breadcrumb'>
    <li><a href='./'>Home</a></li>
    <li class='active'>Pendaftar</li>
</ol>

<div class='row' id='home-content'>
    <div class='col-lg-12'>
      
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").on("click", "#tambah", function() {
                    $('#area-loading').html(''); 
                    $("#kdpendaftar").removeAttr('readonly').val('');
                    $('#tgl_pendaftaran').val('');
                    $('#nama').val('');
                    $('#jenkel').val(''); 
                    $('#kdagama').val('');
                    $('#tpt_lahir').val('');
                    $('#tgl_lahir').val('');
                    $('#alamat').val('');
                    $('#statusanak').val('');
                    $('#nmayah').val('');
                    $('#kdpendidikana').val('');
                    $('#kdpekerjaana').val('');
                    $('#penghasilanayah').val('');
                    $('#nmibu').val('');
                    $('#kdpendidikani').val('');
                    $('#kdpekerjaani').val('');
                    $('#nohp').val('');
                    $('#kdtk').val('');
                    $('#statusdaftar').val('');

                    $(".edit-dialog").modal('toggle');
                });

                $("body").on("click", ".hapus", function() {
                    var clickedID = this.id.split('-')[1];
                    var kdpendaftar = $(".data-0-" + clickedID).html();
                    $(".kdpendaftar").html(kdpendaftar);
                    $('.dialog-hapus').modal('toggle');
                    $("#konf").attr("href", "hapusdaftar.php?kdpendaftar=" + kdpendaftar);
                });

                $("body").on("click", ".edit", function() {
                    var clickedID = this.id.split('-')[1];
                    var fields = [];
                    for (var i = 0; i <= 18; i++) {
                        fields.push(".data-" + i + "-" + clickedID);
                    }

                    $("#kdpendaftar").val($(fields[0]).html()).attr("readonly", "true");
                    $("#tgl_pendaftaran").val($(fields[1]).html());
                    $("#nama").val($(fields[2]).html());
                    $("#jenkel").val($(fields[3]).html());
                    $("#kdagama").val($(fields[4]).html());
                    $("#tpt_lahir").val($(fields[5]).html());
                    $("#tgl_lahir").val($(fields[6]).html());
                    $("#alamat").val($(fields[7]).html());
                    $("#statusanak").val($(fields[8]).html());
                    $("#nmayah").val($(fields[9]).html());
                    $("#kdpendidikana").val($(fields[10]).html());
                    $("#kdpekerjaana").val($(fields[11]).html());
                    $("#penghasilanayah").val($(fields[12]).html());
                    $("#nmibu").val($(fields[13]).html());
                    $("#kdpendidikani").val($(fields[14]).html());
                    $("#kdpekerjaani").val($(fields[15]).html());
                    $("#nohp").val($(fields[16]).html());
                    $("#kdtk").val($(fields[17]).html());
                    $("#statusdaftar").val($(fields[18]).html());
                    $('.edit-dialog').modal('toggle');
                });
            });
        </script>

        <form id="cetak" action="fpdf/examples/print.php" method="post">
            <input type="hidden" name="isi" id="isi" value="">
            <input type="hidden" name="namafile" value="hakakses">
        </form>

        <div class="modal fade dialog-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus data dengan kode pendaftar = <span class='kdpendaftar'></span>?
                    </div>
                    <div class="modal-footer">
                        <a id="konf" href=""><button type="button" class="btn btn-danger">Ya</button></a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <a href="tambahdaftar.php" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
        </div>

        <?php
        include "../koneksi.php";

        if (!$mysqli) {
          die("Connection failed: " . mysqli_connect_error());
        }

        $query = mysqli_query($mysqli, "SELECT * FROM pendaftar");
        $jumlah = mysqli_num_rows($query);
        ?>

        <h4>Daftar Keseluruhan Calon Siswa: <?php echo $jumlah; ?></h4>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal Pendaftaran</th>
                <th>Nama Pendaftar</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              while ($r = mysqli_fetch_array($query)) {
                $no++;
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><span class="data-0-<?php echo $no; ?>"><?php echo $r['tgl_pendaftaran']; ?></span></td>
                  <td><span class="data-1-<?php echo $no; ?>"><?php echo $r['nama']; ?></span></td>
                  <td><span class="data-2-<?php echo $no; ?>"><?php echo $r['jenkel']; ?></span></td>
                  <td>
                    <div class="btn-group" role="group">
                      <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $r['kdpendaftar']; ?>">Detail</button>
                      <a class="hapus" id="hapus-<?php echo $no; ?>">
                        <button type="button" class="btn btn-danger">Hapus</button>
                      </a>
                      <a href="laporan/cetakformulir.php?kdpendaftar=<?php echo $r['kdpendaftar']; ?>">
                        <button type="button" class="btn btn-success"><span class='fa fa-print'></span> Cetak Formulir Pendaftar</button>
                      </a>
                    </div>
                  </td>
                </tr>

                <!-- Modal Detail Pendaftar -->
                <div class="modal fade bs-example-modal-lg<?php echo $r['kdpendaftar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Pendaftar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><strong>Kode Pendaftar:</strong> <?php echo $r['kdpendaftar']; ?></p>
                        <p><strong>Tanggal Pendaftaran:</strong> <?php echo $r['tgl_pendaftaran']; ?></p>
                        <p><strong>Nama Pendaftar:</strong> <?php echo $r['nama']; ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?php echo $r['jenkel']; ?></p>
                        <p><strong>Alamat:</strong> <?php echo $r['alamat']; ?></p>
                        <!-- Tambahkan informasi lainnya sesuai dengan kolom yang ada di tabel pendaftar -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>

                <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
