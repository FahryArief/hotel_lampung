<!DOCTYPE html>
<html lang="en">
<?php
include '../koneksi.php';


if(isset($_POST['tombol']))
{
    if(!isset($_FILES['foto']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $tipe_kamar = $_POST['tipe_kamar'];
$harga = $_POST['harga'];
$jmlhkamar = $_POST['jmlhkamar'];
$stok = $_POST['stok'];
$file_name = $_FILES['foto']['name'];
$file_size = $_FILES['foto']['size'];
$file_type = $_FILES['foto']['type'];
        if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
            mysqli_query($koneksi,"INSERT INTO kamar VALUES ('','$tipe_kamar','$foto','$harga','$stok','$jmlhkamar','$file_name','$file_type','$file_size')");
            header("location:kamar.php");
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
?>

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
                                            <th>Foto</th>
                                            <th>Harga</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Kamar Tersedia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    include '../koneksi.php';
                                    $db = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                                    $hasil = mysqli_query($koneksi,$db);
                                    if (!$hasil) {
                                        die("query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                                    } 
                                    $no = 1;
                                    while($data = mysqli_fetch_assoc($hasil)){
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?> </td>
                                            <td><?php echo $data['tipe_kamar']; ?></td>
                                            <td><img class="d-block"
                                                    src="ambil_foto.php?id_kamar=<?php echo $data['id_kamar']; ?>"
                                                    width="200">
                                            </td>
                                            <td><?php echo "Rp " . number_format($data['harga'],2,',','.'); ?></td>
                                            <td><?php echo $data['jmlhkamar']; ?></td>
                                            <td><?php echo $data['stok']; ?></td>
                                            <td> <a href="edit_kamar.php?id_kamar=<?php  echo $data['id_kamar']; ?>"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="hapus_kamar.php?id_kamar=<?php echo $data['id_kamar']; ?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ...?') ">Hapus</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php $no++; }?>
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
                    <h4 class="modal-title">Tambah Data Kamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tipe Kamar</label>
                                <input type="text" name="tipe_kamar" class="form-control" placeholder="Tipe Kamar">
                            </div>
                            <div class="form-group">
                                <label>Harga Kamar</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga Kamar">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Kamar</label>
                                <input type="text" name="jmlhkamar" class="form-control" placeholder="Jumlah Kamar">
                            </div>
                            <div class="form-group">
                                <label>Kamar Tersedia</label>
                                <input type="text" name="stok" class="form-control" placeholder="Kamar Tersedia">
                            </div>
                            <div class="form-group">
                                <label>Foto Kamar</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="tombol" class="btn btn-primary">Simpan</button>
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