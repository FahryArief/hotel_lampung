<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="assets/image/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Lampung | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="register.php"><b>Hotel</b>Lampung</a>
        </div>
        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['error'] ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['message'] ?>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Mendaftar Akun Member Baru

                <form action="proses_registrasi.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo @$_SESSION['nama'] ?>" aria-describedby="name" autocomplete="off" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo @$_SESSION['username'] ?>" aria-describedby="username" autocomplete="off" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="nik" class="form-control" id="nik" value="<?php echo @$_SESSION['nik'] ?>" aria-describedby="nik" autocomplete="off" placeholder="Nomor Induk Kependudukan">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="hp" id="hp" value="<?php echo @$_SESSION['hp'] ?>" aria-describedby="hp" autocomplete="off" class="form-control" placeholder="No.Handphone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo @$_SESSION['alamat'] ?>" aria-describedby="alamat" autocomplete="off" placeholder="Alamat Rumah">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-home"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo @$_SESSION['email'] ?>" aria-describedby="email" autocomplete="off" placeholder="Alamat Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="password" value="<?php echo @$_SESSION['password'] ?>" aria-describedby="password" autocomplete="off" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="<?php echo @$_SESSION['password_confirmation'] ?>" aria-describedby="password_confirmation" autocomplete="off" placeholder="Konfirmasi password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Saya Setuju Dengan<a href="#"> Syarat & Ketentuan Yang Berlaku </a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="daftar" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="login.php" class="text-center">Saya Sudah Memiliki Akun Member</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>
<?php
session_destroy();
?>

</html>