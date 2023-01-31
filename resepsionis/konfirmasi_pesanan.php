<?php  
include '../koneksi.php';

$id_pesanan = $_POST['id_pesanan'];
$status = $_POST['status'];

mysqli_query($koneksi, "UPDATE pemesanan SET id_pesanan='$id_pesanan', status='$status' where id_pesanan='$id_pesanan'");

header("location:pesanan.php");
?>