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
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <button onclick="cetak()" class="btn btn-success float-left" style="margin-left: 5px;"><i
                                    class="fas fa-print"></i> Print Data Pesanan
                            </button>
                        </div>
                    </div>
                    <form method="GET" action="pesanan.php" style="text-align:right;">
                        <label>Filter : </label>
                        <input type="date" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>">
                        <button type="submit" class="btn btn-sm btn-primary">filter</button>
                    </form>
                    <form method="GET" action="pesanan.php" style="text-align:right;">
                        <label>Search : </label>
                        <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>">
                        <button type="submit" class="btn btn-sm btn-primary">search</button>
                    </form>


                    <a href="index.php" class="small-box-footer ">
                        kembali <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div><!-- /.container-fluid -->
            </div>
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info hilang">
                            <div class="card-body">
                                <div class="scroll hilang">
                                    <table class="table hilangs table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama Pemesan</th>
                                                <th>Nik</th>
                                                <th>Cek in</th>
                                                <th>Cek Out</th>
                                                <th>Tipe Kamar</th>
                                                <th>Harga</th>
                                                <th>Jumlah Kamar</th>
                                                <th>Status</th>
                                                <th class="hilang">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        include '../koneksi.php';
                                        if(isset($_GET['cari'])){
                                            $pencarian = $_GET['cari'];
                                            $query = "select * from pemesanan where nm_pemesan like '%".$pencarian."%' or cek_in like '%".$pencarian."%' or cek_out like '%".$pencarian."%' or nik like '%".$pencarian."%'";
            
                                          }
                                          else {$query = "select * from pemesanan";
                                          }

                                        $no =1;
                                        $data = mysqli_query($koneksi,$query);
                                        while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['nm_pemesan']; ?></td>
                                                <td><?php echo $d['nik']; ?></td>
                                                <td><?php echo $d['cek_in']; ?> </td>
                                                <td> <?php echo $d['cek_out']; ?> </td>
                                                <td>
                                                    <?php 
                              $tipe_kamar = mysqli_query($koneksi, "select * from kamar");
                              while ($a = mysqli_fetch_array($tipe_kamar)) {
                                if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                    <?php echo $a['tipe_kamar']; ?>
                                                    <?php
                                }
                              }
                              ?>
                                                </td>
                                                <td>
                                                    <?php 
                              $harga = mysqli_query($koneksi, "select * from kamar");
                              while ($a = mysqli_fetch_array($harga)) {
                                if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                    <?php echo "Rp " . number_format($a['harga'],2,',','.'); ?>
                                                    <?php
                                }
                              }
                              ?>
                                                </td>
                                                <td>
                                                    <?php echo $d['jml_kamar']; ?>
                                                </td>


                                                <td>
                                                    <?php
                                                if ($d['status'] == 1) {?>
                                                    <span class="badge bg-warning">
                                                        Belum Check In</span>
                                                    <?php } else {?>
                                                    <span class="badge bg-success">Sudah Check In</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="hilang">
                                                    <form  action="konfirmasi_pesanan.php" method="POST">
                                                        <input type="hidden" name="id_pesanan"
                                                            value="<?php echo $d['id_pesanan']; ?>">
                                                        <input type="hidden" name="status" value="2">
                                                        <button type="submit"
                                                            class="btn btn-primary">Konfirmasi</button>
                                                    </form>

                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

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
    <script type="text/javascript">
    function cetak() {
        window.addEventListener("load", window.print());
    }
    </script>

    <style>
        @media print{
            .hilang{
                visibility: hidden;
            }
            .hilangs{visibility: visible;
            }
        }
    .scroll {
        height: 400px;
        overflow: scroll;
    }
    </style>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

</body>

</html>