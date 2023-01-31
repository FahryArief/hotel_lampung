<?php 
session_start();
if($_SESSION['level']==""){
  header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../assets/image/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan Hotel Lampung</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="../assets/image/logo_hotel_lampung.jpg" alt="Logo Hotel Lampung"
                        class="brand-image img-circle">
                    <span class="brand-text font-weight-light">Hotel Lampung</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="pesanan.php" class="nav-link">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>

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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                                    $jmlh_pesanan = mysqli_num_rows($data);
                                    
                                    $data_checkin = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status = '2'");
                                    $jmlh_checkin = mysqli_num_rows($data_checkin);

                                    $data_blm_checkin = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE status = '1'");
                                    $jmlh_blm_checkin = mysqli_num_rows($data_blm_checkin);

                            
                                    ?>
                                    <div class="col-lg-4 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $jmlh_pesanan;
                                                ?></h3>

                                                <p>Total Pesanan</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-cart-plus"></i>
                                            </div>
                                            <a href="pesanan.php" class="small-box-footer">
                                                Lihat Pesanan <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $jmlh_checkin;
                                                ?></h3>

                                                <p>Sudah Check In</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <a href="pesanan.php" class="small-box-footer">
                                                Lihat Pesanan <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $jmlh_blm_checkin;
                                                ?></h3>
                                                <p>Belum Check In</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-xmark"></i>
                                            </div>
                                            <a href="pesanan.php" class="small-box-footer">
                                                Lihat Pesanan <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>