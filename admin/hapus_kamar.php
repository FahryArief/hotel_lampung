<?php
include '../koneksi.php';
$id = $_GET['id_kamar'];

$hapus = "DELETE FROM kamar WHERE id_kamar = '$id'";
$hasil_hapus = mysqli_query($koneksi,$hapus);

if(!$hasil_hapus) {
    die ("Gagal menghapus data: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil dihapus.');window.location='kamar.php';</script>";
  }
?>