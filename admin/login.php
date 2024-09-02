<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../koneksi.php";

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION)) session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $errorusername = $errorpassword = $errorall = "";

    if (trim($_POST['username']) == "")
        $errorusername = "Isikan username";
    if (trim($_POST['password']) == "")
        $errorpassword = "Isikan password";

    if (trim($_POST['username']) != "" && trim($_POST['password']) != "") {
        $userpost = trim($_POST['username']);
        $passpost = trim($_POST['password']);

        // Debugging
        var_dump($userpost, $passpost);

        $stmt = $mysqli->prepare("SELECT * FROM login WHERE username = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $mysqli->error);
        }
        $stmt->bind_param("s", $userpost);
        $stmt->execute();
        $result = $stmt->get_result();
        $r = $result->fetch_assoc();

        // Debugging
        var_dump($r);

        if ($result->num_rows != 0) {
            // Membandingkan password dalam bentuk teks biasa
            if ($passpost === $r['password']) {
                $_SESSION['username'] = $userpost;
                $_SESSION['nama'] = $r['nama'];
                $_SESSION['udahlogin'] = "Y";
                header("location:index.php");
                exit;
            } else {
                $errorall = "Login gagal!";
            }
        } else {
            $errorall = "Login gagal!";
        }
    }
}
?>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout blur-login">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-car brown"></i>
                                    <span class="green">LES PRIVAT</span><br>
                                    <span class="blue" id="id-text2">HOME SCHOOLING PRIMAGAMA</span>
                                </h1>
                                <h4 class="purple" id="id-company-text">&copy; by: Warih Prasetyono</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                Silahkan Login
                                            </h4>

                                            <div class="space-6"></div>

                                            <form action="" method="post">
                                                <fieldset>
                                                    <span class="error" style="color:red">
                                                        <?php  if(isset($_GET['code'])) echo "Anda berhasil logout!"; ?>
                                                        <?php  if(isset($errorall)) echo $errorall; ?>
                                                        <?php  if(isset($errorusername)) echo "* ".$errorusername; ?>
                                                    </span>
            
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" name="username" placeholder="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>
                                                    <span class="error" style="color:red"><?php if(isset($errorpassword)) echo "* ".$errorpassword; ?></span>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>
                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="../" class="forgot-password-link">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    Kembali Ke Beranda
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                            </div><!-- /.position-relative -->

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="assets/js/jquery.2.1.1.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="assets/js/jquery.1.11.1.min.js"></script>
        <![endif]-->
    </body>
</html>
