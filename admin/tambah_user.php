<?php  
include '../koneksi.php';
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
//mengirim ke databases



mysqli_query($koneksi, "INSERT INTO akun VALUES ('', '$nama', '$username',  '$password', '', '', '', '', '$level')");
header("location:user.php");
?>