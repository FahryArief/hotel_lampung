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
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['message'])) {
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['message']?>
				</div>
				<?php
				}
				?>


				<div class="card ">
					<div class="card-title text-center">
						<h1>Profile Form</h1>
					</div>
					<div class="card-body">
						<form action="update-profile.php" method="post">
                            <input type="hidden" name="id_akun" class="form-control" id="id_akun" value="<?php echo @$user['id_akun']?>" >
							<div class="form-group">
								<label for="name">Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" id="name" value="<?php echo @$user['nama']?>" aria-describedby="name" placeholder="Nama lengkap" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" value="<?php echo @$user['username']?>" aria-describedby="username" placeholder="username" autocomplete="off">

							</div><div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" id="email" value="<?php echo @$user['email']?>" aria-describedby="email" placeholder="Email" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="hp">Nomor Handphone</label>
								<input type="number" name="hp" class="form-control" id="hp" value="<?php echo @$user['hp']?>" aria-describedby="hp" placeholder="Nomor Handphone" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo @$user['alamat']?>" aria-describedby="alamat" placeholder="Alamat Rumah" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" value="<?php echo @$_SESSION['password']?>" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="password">Konfirmasi Password</label>
								<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="<?php echo @$_SESSION['password_confirmation']?>"  placeholder="Password">
							</div>

							<button type="submit" class="btn btn-primary">Update Data</button>
						</form>

						<a href="index.php">Batal</a>
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
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['message']);
?>