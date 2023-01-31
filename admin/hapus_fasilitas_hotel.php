<?php
include '../koneksi.php';
$id = $_GET['id_fasilitas'];

$hapus = "DELETE FROM fasilitas WHERE id_fasilitas = '$id'";
$hasil_hapus = mysqli_query($koneksi,$hapus);

if(!$hasil_hapus) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil dihapus.');window.location='fasilitas_hotel.php';</script>";
  }
?>