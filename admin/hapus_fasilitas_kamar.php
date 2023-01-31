<?php
include '../koneksi.php';
$id = $_GET['id_fasilitas_k'];

$hapus = "DELETE FROM fasilitas_kamar WHERE id_fasilitas_k = '$id'";
$hasil_hapus = mysqli_query($koneksi,$hapus);

if(!$hasil_hapus) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil dihapus.');window.location='fasilitas_kamar.php';</script>";
  }
?>