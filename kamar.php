<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="assets/image/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan Hotel Lampung</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="assets/image/logo_hotel_lampung.jpg" alt="Logo Hotel Lampung" class="brand-image img-circle">
                    <span class="brand-text font-weight-light">Hotel Lampung</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="kamar.php" class="nav-link">kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas_hotel.php" class="nav-link">Fasilitas Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                    </ul>
                    <!-- SEARCH FORM -->
                </div>
                <!-- Right navbar links -->
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Daftar Kamar Hotel Syariah Aini</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container">
                    <?php
                    include 'koneksi.php';
                    $db = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                    $hasil = mysqli_query($koneksi, $db);
                    if (!$hasil) {
                        die("query Error: " . mysqli_errno($koneksi) . "-" . mysqli_error($koneksi));
                    }
                    while ($data = mysqli_fetch_assoc($hasil)) {
                    ?>
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-body card-outline">
                                                <table style="font-family:cursive; ">
                                                    <tr>
                                                        <td>
                                                            <h2><?php echo $data['tipe_kamar']; ?> <br></h2>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                                                            while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                                                if ($a['id_kamar'] == $data['id_kamar']) {
                                                            ?>
                                                                    <h5><b>Fasilitas : </b>
                                                                        <br>
                                                                        <?php echo $a['fasilitas']; ?>
                                                                    </h5>

                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><b> Jumlah Kamar :</b> <?php echo $data['jmlhkamar']; ?>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><b> Kamar Tersedia :</b> <?php echo $data['stok']; ?></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><b> Kamar Disewa
                                                                    :</b><?php echo $data['jmlhkamar'] - $data['stok']; ?>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5><b>Harga
                                                                    :</b><?php echo "Rp." . number_format($data['harga'], 0, ',', '.'); ?>
                                                            </h5>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body card-outline">
                                                <img class="d-block w-100" src="lihat_foto.php?id_kamar=<?php echo $data['id_kamar']; ?>" height="350">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!-- /.container-fluid -->
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <style>
        body {
            font-family: 'Montserrat';
        }
    </style>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>