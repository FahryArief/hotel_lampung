<?php
include '../koneksi.php';

$id_kamar = $_POST['id_kamar'];
$fasilitas = $_POST['fasilitas'];

mysqli_query($koneksi,"insert into fasilitas_kamar values('','$id_kamar','$fasilitas')");
header("location:fasilitas_kamar.php")
?>