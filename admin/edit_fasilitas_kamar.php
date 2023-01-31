<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <link rel="shortcut icon" href="../assets/image/favicon.ico">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan Hotel</title>

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
                    <img src="../assets/image/logo_hotel_lampung.jpg" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
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
                            <a href="user.php" class="nav-link">Users</a>
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
                            <h1 class="m-0">Fasilitas</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                Edit Data Fasilitas
                            </div>
                            <div class="card-body">
                                <?php
                include '../koneksi.php';
                $id = $_GET['id_fasilitas_k'];
                $data = mysqli_query($koneksi, "select * from fasilitas_kamar where id_fasilitas_k='$id'");
                while($d = mysqli_fetch_array($data)){
                  ?>
                                <form action="update_fasilitas_kamar.php" method="POST">
                                    <div class="form-group">
                                        <label>Tipe Kamar</label>
                                        <input type="hidden" name="id_fasilitas_k"
                                            value="<?php echo $d['id_fasilitas_k'] ?>">
                                        <select name="id_kamar" class="form-control">
                                            <option value="">--- Pilih Kamar ---</option>
                                            <?php 
                        $kamar = mysqli_query($koneksi, "select * from kamar");
                        while ($a = mysqli_fetch_array($kamar)) {
                          if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                            <option value="<?php echo $a['id_kamar']; ?>" selected>
                                                <?php echo $a['tipe_kamar']; ?></option>";
                                            <?php }else{ ?>
                                            <option value="<?php echo $a['id_kamar']; ?>">
                                                <?php echo $a['tipe_kamar']; ?>
                                            </option>";
                                            <?php }
                        }
                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Fasilitas Kamar</label>
                                        <textarea name="fasilitas" class="form-control"
                                            rows="3"><?php echo $d['fasilitas'] ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
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

    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Fasilitas Kamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="tambah_fasilitas_hotel.php" method="POST">
                        <div class="form-group">
                            <label>No. Kamar</label>
                            <select name="id_kamar" class="form-control">
                                <option value="">--- Pilih Kamar ---</option>
                                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi, "select * from kamar");
                while ($d = mysqli_fetch_array($data)) { 
                  ?>
                                <option value="<?php echo $d['id_kamar']; ?>"><?php echo $d['tipe_kamar']; ?></option>
                                <?php
                }
                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas Kamar</label>
                            <textarea name="fasilitas" class="form-control" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</body>

</html>