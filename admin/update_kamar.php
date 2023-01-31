<?php
include '../koneksi.php';
$id_kamar = $_POST['id_kamar'];
$tipe_kamar = $_POST['tipe_kamar'];
$harga = $_POST['harga'];
$foto = $_FILES['foto']['name'];
$jmlhkamar = $_POST['jmlhkamar'];
$stok = $_POST['stok'];$tipe_kamar = $_POST['tipe_kamar'];
$harga = $_POST['harga'];
$jmlhkamar = $_POST['jmlhkamar'];
$stok = $_POST['stok'];
$file_name = $_FILES['foto']['name'];
$file_size = $_FILES['foto']['size'];
$file_type = $_FILES['foto']['type'];

if($foto != "") {
  if($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png')){
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $query  = "UPDATE kamar SET tipe_kamar = '$tipe_kamar', harga = '$harga', foto = '$foto', stok = '$stok', jmlhkamar= '$jmlhkamar',nama_foto='$file_name',tipe_foto = '$file_type',ukuran_foto = '$file_size'";
    $query .= "WHERE id_kamar = '$id_kamar'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
  $query  = "UPDATE kamar SET tipe_kamar = '$tipe_kamar', harga = '$harga', stok = '$stok', jmlhkamar= '$jmlhkamar'";
  $query .= "WHERE id_kamar = '$id_kamar'";
  $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil diubah.');window.location='kamar.php';</script>";
  }
}
?>