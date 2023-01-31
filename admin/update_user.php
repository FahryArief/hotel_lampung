<?php  
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($koneksi, "UPDATE user SET id = '$id', nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id = '$id'");

header("location:user.php");
?>