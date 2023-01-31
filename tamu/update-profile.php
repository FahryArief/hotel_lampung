<?php
session_start();

include "../koneksi.php";

//dapatkan data user dari form register
$user = [
	'id_akun' => $_POST['id_akun'],
	'nama' => $_POST['nama'],
	'hp' => $_POST['hp'],
	'email' => $_POST['email'],
	'alamat' => $_POST['alamat'],
	'username' => $_POST['username'],
	'password' => $_POST['password'],
	'password_confirmation' => $_POST['password_confirmation'],
];

//cek jika password tidak kosong, jika kosong jangan di update.
if($_POST['password'] !== ''){

    //validasi jika password & password_confirmation sama
    if($user['password'] != $user['password_confirmation']){
        $_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['username'] = $_POST['username'];
        header("Location: profile.php");
        return;
    }
}

//check apakah user dengan username tersebut ada di table users yang kecuali user tersebut.
$query = "select * from akun where username = ? and id_akun != ? limit 1";
$stmt = $koneksi->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('si', $user['username'], $user['id_akun']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

//jika username sudah ada, maka return kembali ke halaman profile.
if($row != null){
	$_SESSION['error'] = 'Username: '.$user['username'].' yang anda masukkan sudah ada di database.';
	$_SESSION['nama'] = $_POST['nama'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['password_confirmation'] = $_POST['password_confirmation'];
	header("Location: profile.php");
	return;

}else{


	$stmt = $koneksi->stmt_init();

	//username unik. update data user di database.
	$query = "update akun set nama = ?, username = ?, email = ?, hp = ?,alamat = ? where id_akun = ?";

	//jika password dirubah
    if($_POST['password'] !== ''){
	    $password = password_hash($user['password'],PASSWORD_DEFAULT);
        $query = "update akun set nama = ?, username = ? , password = ?, email = ?, hp = ?,alamat = ? where id_akun = ?";
    }

	$stmt->prepare($query);

    //jika password dirubah
    if($_POST['password'] !== ''){
	    $stmt->bind_param('ssssisi', $user['nama'],$user['username'],$password,$user['email'],$user['hp'],$user['alamat'],$user['id_akun']);
    }else{
	    $stmt->bind_param('sssssi', $user['nama'],$user['username'],$user['email'],$user['hp'],$user['alamat'], $user['id_akun']);
    }
	$result = $stmt->execute();
	$result = $stmt->affected_rows;
    if($result){
        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['username'] = $_POST['username'];
	    $_SESSION['message']  = 'Berhasil mengupdate data profile di sistem.';
        header("Location: profile.php");
    }else{
        $_SESSION['error'] = 'Gagal update data profile.';
        header("Location: profile.php");
    }
}

?>