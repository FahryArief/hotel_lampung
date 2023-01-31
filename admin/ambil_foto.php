<?php
include '../koneksi.php';
if (isset($_GET['id_kamar'])) {
    $query = mysqli_query($koneksi, "select * from kamar where id_kamar='" . $_GET['id_kamar'] . "'");
    $row = mysqli_fetch_array($query);
    header("Content-type: " . $row["tipe_foto"]);
    echo $row["foto"];
} elseif (isset($_GET['id_fasilitas'])) {
    $querys = mysqli_query($koneksi, "select * from fasilitas where id_fasilitas='" . $_GET['id_fasilitas'] . "'");
    $rows = mysqli_fetch_array($querys);
    header("Content-type: " . $rows["tipe_foto"]);
    echo $rows["foto"];
} else {
    header('location:index.php');
}
