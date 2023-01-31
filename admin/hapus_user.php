<?php
include '../koneksi.php';
$id_user = $_GET["id_user"];
//get id

    //jalankan query DELETE untuk menghapus data
$query = "DELETE FROM user WHERE id_user='$id_user' ";
$hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='user.php';</script>";
}