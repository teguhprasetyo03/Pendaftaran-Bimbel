<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="./" style="color:magenta">
                <marquee>   <p>Home Schooling Primagama</p></marquee></a> 
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li class="c1 active"><a href="./"><span class="fa fa-home"></span> Home</a></li>
                    <li class="c2"><a href="pengumuman.php"><span class="fa fa-users"></span> Pengumuman</a></li>
                    <li class="c3"><a href="pendaftaran.php"><span class="fa fa-pencil"></span> Pendaftaran</a></li>
                    <li class="c4"><a href="biaya.php"><span class="fa fa-money"></span> Biaya</a></li>
                    <li class="c5"><a href="about.html"><span class="fa fa-book"></span> Tentang</a></li>
                
                    <li class="c6"><a href="admin"><span class="fa fa-lock"></span> Login</a></li>

                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    <!-- Header -->
   
    <!-- /Header -->

  <div class="container">
    <div class="row">
            
                    <div class="col-md-12">
                        <div class="grey-box-icon b4">  
                            <h4>SELAMAT</h4>
                            <p>ANDA TELAH BERHASIL MELAKUKAN PENDAFTARAN </p>
                            <p><a href="./pengumuman.php"><em>Pengumuman→</em></a></p>
                        </div><!--grey box -->
                    </div><!--/span3-->
                </div>
    </div>
      <section class="news-box top-margin">
     
    </section>
   
  
    
     
      
         
    <footer id="footer">
 
        <div class="container">
   <div class="row">
  <div class="footerbottom">

    <div class="col-md-12 col-sm-7"> 
                <div class="footerwidget"> 
                         <h4>Hubungi Kami</h4>
            <div class="contact-info"> 
            <i class="fa fa-facebook"></i> Home Schooling Primagama<br>
            <i class="fa fa-phone"></i>021-99999999 <br>
             <i class="fa fa-envelope-o"></i> homeschooling_Primagama@gmail.com
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
            <div class="social text-center">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <div class="clear"></div>
            <!--CLEAR FLOATS-->
        </div>
        <div class="footer2">
            <div class="container">
                <div class="row">

                

                    <div class="col-md-12 panel">
                        <div class="panel-body">
                            <p class="text-right">
                                Copyright &copy; 2018. Warih Prasetyono
                            </p>
                        </div>
                    </div>

                </div>
                <!-- /row of panels -->
            </div>
        </div>
    </footer>

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="assets/js/modernizr-latest.js"></script> 
    <script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="assets/js/custom.js"></script>
    <script>
        jQuery(function(){
            
            jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
                height: '600',
                loader: 'false',
                pagination: true,
                thumbnails: false,
                hover: false,
                playPause: false,
                navigation: false,
                opacityOnGrid: false,
                imagePath: 'assets/images/'
            });

        });
      
    </script>
    
</body>
</html>
