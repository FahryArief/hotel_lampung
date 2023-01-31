<?php
session_start();

//include koneksi
include "../koneksi.php";

//get user detail
$id_akun = $_SESSION['id_akun'];
$query = "select * from akun where id_akun = ? limit 1";
$stmt = $koneksi->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $id_akun);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Pemesanan Hotel Lampung</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="shortcut icon" href="../assets/image/favicon.ico">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <img src="../assets/image/logo_hotel_lampung.jpg" alt="Logo Hotel Lampung" class="brand-image img-circle">
                    <span class="brand-text font-weight-light">Hotel Lampung</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="pesan.php" class="nav-link">Pesan</a>
                        </li>
                                    <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Profile</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="profile.php" class="dropdown-item">Setting</a></li>
              <li><a href="logout.php" class="dropdown-item">Logout</a></li>
          </ul>
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
            
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-title text-center">
                        <h1>Formulir Pemesanan</h1>
                    </div>
                    <div class="card-body">
                       <form action="form_pemesanan.php" method="POST">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                               <div class="form-group">
                                <input type="hidden" name="id_akun" class="form-control"  id="id_akun" value="<?php echo @$user['id_akun']?>" >
                                            <label>Nama Pemesan</label>
                                                <input type="text" class="form-control col-md-5" name="nm_pemesan"
                                                value="<?php echo @$user['nama']?>" 
                                                    placeholder="Masukkan Nama Pemesan">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nomor Induk Kependudukan</label>
                                                <input type="text" class="form-control col-md-5"  name="nik"
                                                value="<?php echo @$user['nik']?>" placeholder="Masukkan NIK Sesuai Pada KTP">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                                <input type="email" class="form-control col-md-5"  name="email_pemesan" value="<?php echo @$user['email']?>"
                                                    placeholder="Masukkan Email">
                                        </div>
                                        <div class="form-group">
                                            <label>No.Handphone</label>
                                                <input type="number" class="form-control col-md-5" name="hp_pemesan" value="<?php echo @$user['hp']?>"
                                                    placeholder="Masukkan Nomor Handphone">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Kamar</label>
                                            <select name="id_kamar" class="form-control col-md-5">
                                                <option value="">--- Pilih Tipe Kamar ---</option>
                                                <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($koneksi,"select * from kamar");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                                <option value="<?php echo $d['tipe_kamar'];?>">
                                                    <?php echo $d['tipe_kamar']; ?> </option>
                                        
        <?php  
                                }
                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kamar</label>
                                                <input type="number" min="1" max="<?php $d['stok']; ?>" class="form-control col-md-5" name="jml_kamar"
                                                    placeholder="Jumlah Kamar">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Tamu</label>
                                                <input type="number" class="form-control col-md-5" name="jumlah_tamu"
                                                    placeholder="Masukkan Jumlah Tamu">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Check in</label>
                                                <input type="date" class="form-control col-md-5" name="cek_in"
                                                    id="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Check Out</label>
                                                <input type="date" class="form-control col-md-5" name="cek_out"
                                                    id="tanggall">
                                        </div>
                                        
                                    
                                            <button type="submit" value="cetak_bukti.php"
                                                class="btn btn-primary">Pesan</button>
                                        
                                    </div>
                            </div>
                        </form>
                        
                    </div>
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
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <style>
        body {
            font-family: 'Montserrat';
        }
    </style>
    <style type="text/css">
    .login {
        border: 1px solid #ccc;
    }
    input[type=text],input[type=number], input[type=email],input[type=password],input[type=date] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    select{
         margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    button[type=submit] {
        margin: 5px auto;
        float: center;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        cursor: pointer;
    }
</style>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        var date = new Date();
        var day = date.getDate()
        var month = date.getMonth() + 1
        var year = date.getFullYear()
        if (day < 10) {
            day = '0' + day
        }
        if (month < 10) {
            month = '0' + month
        }


        var minDate = year + '-' + month + '-' + day
        document.getElementById('tanggal').setAttribute("min", minDate);
        document.getElementById('tanggall').setAttribute("min", minDate);
    </script>
</body>

</html>