<?php
include '../koneksi.php';
$id_fasilitas = $_POST['id_fasilitas'];
$foto = $_FILES['foto']['name'];
$keterangan = $_POST['keterangan'];
        $file_name = $_FILES['foto']['name'];
        $file_size = $_FILES['foto']['size'];
        $file_type = $_FILES['foto']['type'];
if($foto != "") {
  if ($file_size < 2048000 and ($file_type == 'image/jpeg' or $file_type == 'image/png')) {
            $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $query  = "UPDATE fasilitas SET keterangan = '$keterangan', foto = '$foto',nama_foto='$file_name',tipe_foto = '$file_type',ukuran_foto = '$file_size'";
    $query .= "WHERE id_fasilitas = '$id_fasilitas'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='fasilitas_hotel.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='fasilitas_hotel.php';</script>";
  }
} else {
  $query  = "UPDATE fasilitas SET keterangan = '$keterangan'";
  $query .= "WHERE id_fasilitas = '$id_fasilitas'";
  $result = mysqli_query($koneksi, $query);
      // periska query apakah ada error
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
     " - ".mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil diubah.');window.location='fasilitas_hotel.php';</script>";
  }
}
?>