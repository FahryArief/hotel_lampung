<?php
include '../koneksi.php';
if (isset($_GET['id_kamar'])) {
    $id_kamar = ($_GET['id_kamar']);
    $query = "SELECT * FROM kamar WHERE id_kamar='$id_kamar'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan : ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) 
    {
        echo "<script>alert('Data Tidak Di Temukan Di Database');window.location='kamar.php';</script>";
    }
} else {
    echo "<script>alert('Masukan Data');window.location='kamar.php';</script>";
}

?>
<!DOCTYPE html>
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
                            <h1 class="m-0">Kamar</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3>Edit Data Kamar</h3>
                            </div>
                            <!-- /.card-header -->
                            <form method="post" action="update_kamar.php" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>No Kamar</label>
                                        <input name="id_kamar" value="<?php echo $data['id_kamar']; ?>" hidden>
                                        <input type="text" value="<?php echo $data['tipe_kamar']; ?>" name="tipe_kamar"
                                            class="form-control" placeholder="Nomor Kamar">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" value="<?php echo $data['harga']; ?>" name="harga"
                                            class="form-control" placeholder="Harga Kamar">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kamar</label>
                                        <input type="text" value="<?php echo $data['jmlhkamar']; ?>" name="jmlhkamar"
                                            class="form-control" placeholder="Jmlah Kamar">
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" value="<?php echo $data['stok']; ?>" name="stok"
                                            class="form-control" placeholder="Stok Kamar">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Kamar</label>
                                        <img class="d-block" src="ambil_foto.php?id_kamar=<?php echo $data['id_kamar']; ?>" height="200"
                                            >
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                    <button type="submit" name="tombol" class="btn btn-primary">Update</button>
                                </div>
                            </form>
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