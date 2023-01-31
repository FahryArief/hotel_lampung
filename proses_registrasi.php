<?php
session_start();

include "koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
//dapatkan data user dari form register
$user = [
    'nama' => $_POST['nama'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'password_confirmation' => $_POST['password_confirmation'],
    'email' => $_POST['email'],
    'hp' => $_POST['hp'],
    'alamat' => $_POST['alamat'],
    'nik' => $_POST['nik'],
];
//validasi jika password & password_confirmation sama

if ($user['password'] != $user['password_confirmation']) {
    $_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['nik'] = $_POST['nik'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['hp'] = $_POST['hp'];
    $_SESSION['alamat'] = $_POST['alamat'];
    $_SESSION['username'] = $_POST['username'];
    header("Location: register.php");
    return;
}

//check apakah user dengan username tersebut ada di table users
$query = "select * from akun where username = ? limit 1";
$stmt = mysqli_stmt_init($koneksi);
$stmt->prepare($query);
$stmt->bind_param('s', $user['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

//jika username sudah ada, maka return kembali ke halaman register.
if ($row != null) {
    $_SESSION['error'] = 'Username: ' . $user['username'] . ' yang anda masukkan sudah ada di database.';
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['nik'] = $_POST['nik'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['hp'] = $_POST['hp'];
    $_SESSION['alamat'] = $_POST['alamat'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['password_confirmation'] = $_POST['password_confirmation'];
    header("Location: register.php");
    return;
} else {
    //username unik. simpan di database.
    mysqli_query($koneksi, "INSERT INTO akun VALUES ('', '$nama', '$username', '$password', '$email', '$hp', '$alamat', '$nik', '3')");
    $_SESSION['message']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
    header("Location: register.php");
}
