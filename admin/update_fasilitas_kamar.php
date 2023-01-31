<?php
include '../koneksi.php';

$id_fasilitas_k = $_POST['id_fasilitas_k'];
$id_kamar = $_POST['id_kamar'];
$fasilitas = $_POST['fasilitas'];

mysqli_query($koneksi, "update fasilitas_kamar set id_kamar='$id_kamar', fasilitas='$fasilitas' where id_fasilitas_k='$id_fasilitas_k'");

header("location:fasilitas_kamar.php");
?>