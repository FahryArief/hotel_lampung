<?php  
include '../koneksi.php';

$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nm_pemesan = $_POST['nm_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$id_kamar = $_POST['id_kamar'];
$nik = $_POST['nik'];
$jumlah_tamu = $_POST['jumlah_tamu'];

mysqli_query($koneksi, "INSERT INTO pemesanan values('','$cek_in','$cek_out','$jml_kamar','$nm_pemesan', '$email_pemesan','$hp_pemesan','$id_kamar','1','$nik','$jumlah_tamu',NOW())");
//Sesudah Menginput Di alihkan Ke halaman index
header("location:invoice.php");


?>