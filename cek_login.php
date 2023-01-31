<?php
session_start();

include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level'] == "1") {

		// buat session login dan username
		$_SESSION['id_akun'] = $data['id_akun'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:admin");

		// cek jika user login sebagai resepsionis
	} else if ($data['level'] == "2") {
		// buat session login dan username
		$_SESSION['id_akun'] = $data['id_akun'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "2";
		// alihkan ke halaman dashboard resepsionis
		header("location:resepsionis");
	}
	else if ($data['level'] == "3") {
		$_SESSION['id_akun'] = $data['id_akun'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "3";
		// alihkan ke halaman tamu
		header("location:tamu");
	}
} else {
	header("location:index.php?pesan=gagal");
}
?>