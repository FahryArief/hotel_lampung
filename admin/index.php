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
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
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
                            <a href="kamar.php" class="nav-link">Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas_kamar.php" class="nav-link">Fasilitas Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas_hotel.php" class="nav-link">Fasilitas Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a href="user.php" class="nav-link">Akun</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                    <!-- SEARCH FORM -->
                </div>
                <!-- Right navbar links -->
            </div>
        </nav>
        <!-- /.navbar -->
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
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-secondary">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi, "SELECT * FROM kamar");
                                    $id_kamar = mysqli_num_rows($data);
                                    $dataf = mysqli_query($koneksi, "SELECT * FROM fasilitas_kamar");
                                    $id_fasilitas_kamar = mysqli_num_rows($dataf);
                                    $datag = mysqli_query($koneksi, "SELECT * FROM fasilitas");
                                    $id_fasilitas = mysqli_num_rows($datag);
                                    $datau = mysqli_query($koneksi, "SELECT * FROM akun");
                                    $id_user = mysqli_num_rows($datau);

                                    $result = mysqli_query($koneksi, 'SELECT SUM(stok) AS stok_sum, SUM(jmlhkamar) AS jmlh_kamar FROM kamar'); 
$row = mysqli_fetch_assoc($result); 
                                    ?>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $id_kamar;
                                                ?></h3>

                                                <p>Kamar</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $id_fasilitas_kamar;
                                                ?></h3>

                                                <p>Fasilitas Kamar</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-list-alt"></i>
                                            </div>
                                            <a href="fasilitas.php" class="small-box-footer">
                                                Lihat Data Fasilitas <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $id_fasilitas;
                                                ?></h3>

                                                <p>Fasilitas Hotel</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-image"></i>
                                            </div>
                                            <a href="fasilitas_hotel.php" class="small-box-footer">
                                                Lihat Data Fasilitas Hotel <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $id_user;
                                                ?></h3>

                                                <p>Akun</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="users.php" class="small-box-footer">
                                                Lihat Data User <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $row['jmlh_kamar'];
                                                ?></h3>
                                                <p>Jumlah Kamar Hotel</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $row['stok_sum'];
                                                ?></h3>

                                                <p>Kamar Tersedia</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-duotone fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-secondary">
                                            <div class="inner">
                                                <h3><?php echo $row['jmlh_kamar'] - $row['stok_sum'];
                                                ?></h3>

                                                <p>Kamar Disewa</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>