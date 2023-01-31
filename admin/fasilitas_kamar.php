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
                            <a href="Fasilitas_hotel.php" class="nav-link">Fasilitas Hotel</a>
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
                        <div class="card card-outline card-dark">
                            <div class="card-header">
                                <button class="btn btn-sm btn-primary " data-toggle="modal"
                                    data-target="#Tambah">Tambah</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tipe Kamar</th>
                                            <th>Fasilitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';
                                        $no =1;
                                        $data = mysqli_query($koneksi, "select * from fasilitas_kamar");
                                        while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php 
                                                  $kamar = mysqli_query($koneksi, "select * from kamar");
                                                  while ($a = mysqli_fetch_array($kamar)) {
                                                    if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                <?php echo $a['tipe_kamar']; ?>
                                                <?php
                                                }
                                            }
                                            ?></td>
                                            <td>
                                                <?php echo $d['fasilitas']; ?>
                                            </td>
                                            <td>
                                                <a href="edit_fasilitas_kamar.php?id_fasilitas_k=<?php echo $d['id_fasilitas_k']; ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="hapus_fasilitas_kamar.php?id_fasilitas_k=<?php echo $d['id_fasilitas_k']; ?>"
                                                    class="btn btn-danger">Hapus</a>
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
    <div class="modal fade" id="Tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Fasilitas Kamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="tambah_fasilitas_kamar.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tipe Kamar</label>
                                <select name="id_kamar" class="form-control">
                                    <option value="">--- Pilih Tipe Kamar ---</option>
                                    <?php
                                    $data = mysqli_query($koneksi,"select * from kamar");
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                    <option value="<?php echo $d['id_kamar'];?>"><?php echo $d['tipe_kamar']; ?>
                                    </option>
                                    <?php  
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <textarea name="fasilitas" class="form-control" rows="3"
                                    placeholder="Fasilitas"></textarea>
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
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>