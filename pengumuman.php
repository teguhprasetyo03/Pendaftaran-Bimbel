
<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="free-educational-responsive-web-template-webEdu">
  <meta name="author" content="webThemez.com">
  <title>Home Schooling Primagama</title>
  <link rel="favicon" href="assets/images/favicon.png">
  <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel='stylesheet' id='camera-css' href='assets/css/camera.css' type='text/css' media='all'> 
</head>
<body>
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./" style="color:purple">
          <marquee><p>Home Schooling Primagama</p></marquee>
        </a> 
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right mainNav">
          <li class="c1"><a href="./"><span class="fa fa-home"></span> Home</a></li>
          <li class="c2 active"><a href="pengumuman.php"><span class="fa fa-users"></span> Pengumuman</a></li>
          <li class="c3"><a href="pendaftaran.php"><span class="fa fa-pencil"></span> Pendaftaran</a></li>
          <li class="c4"><a href="biaya.php"><span class="fa fa-money"></span> Biaya</a></li>
          <li class="c5"><a href="about.html"><span class="fa fa-book"></span> Tentang</a></li>
          <li class="c6"><a href="admin"><span class="fa fa-lock"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header id="head">
    <div class="container">
      <div class="heading-text">              
        <h1 class="animated flipInY delay1">Home Schooling Primagama</h1>
        <p>Fun and Enjoyable Learning Method</p>
      </div>
      <div class="fluid_container">                       
        <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
          <div data-thumb="assets/images/slides/thumbs/img1.jpg" data-src="assets/images/slides/img1.jpg">
            <h2>We develop.</h2>
          </div> 
          <div data-thumb="assets/images/slides/thumbs/img2.jpg" data-src="assets/images/slides/img2.jpg"></div>
          <div data-thumb="assets/images/slides/thumbs/img3.jpg" data-src="assets/images/slides/img3.jpg"></div> 
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <center><h3 style="color: red">PENGUMUMAN HASIL SELEKSI PENDAFTARAN <span class='fa fa-user'></span></h3></center>
    <center><h4 style="color: green">Bagi siswa yang telah diterima harap segera melakukan konfirmasi kepada kami<span class='fa fa-user'></span></h4></center>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Pendaftar</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($mysqli, "SELECT * FROM pendaftar");
          $no = 0;
          while ($r = mysqli_fetch_array($query)) {
            $no++;
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><span class="data-0-<?php echo $no; ?>"><?php echo $r['nama']; ?></span></td>
            <td><span class="data-1-<?php echo $no; ?>"><?php echo $r['jenkel']; ?></span></td>
            <td><span class="data-2-<?php echo $no; ?>"><?php echo $r['statusdaftar']; ?></span></td>
            <td>
              <div class="btn-group" role="group">
                <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $r['id']; ?>">Detail</button>
              </div>
            </td>
          </tr>

          <!-- Modal Detail Pengumuman -->
          <div class="modal fade bs-example-modal-lg<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Pengumuman</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p><strong>Nama Pendaftar:</strong> <?php echo $r['nama']; ?></p>
                  <p><strong>Jenis Kelamin:</strong> <?php echo $r['jenkel']; ?></p>
                  <p><strong>Status:</strong> <?php echo $r['statusdaftar']; ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("body").on("click", ".hapus", function() {
        var clickedID = this.id.split('-')[1];
        var id = $(".data-0-" + clickedID).html();
        $(".kdpendaftar").html(id);
        $('.dialog-hapus').modal('toggle');
        $("#konf").attr("href", "hapus_pengumuman.php?id=" + id);
      });
    });
  </script>
</body>
</html>
