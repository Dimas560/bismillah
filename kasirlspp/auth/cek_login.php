<?php
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($kon, "SELECT * FROM tb_user WHERE username ='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	if ($data['id_level'] == 1) {
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['level'] = "Admin";
		header("location:../dashboard/index.php?makanan");
	} elseif ($data['id_level'] == 2) {
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['level'] = "Waiter";
		header("location:../dashboard/index.php?home");
	} elseif ($data['id_level'] == 3) {
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['level'] = "Kasir";
		header("location:../dashboard/index.php?transaksi");
	} elseif ($data['id_level'] == 4) {
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['level'] = "Owner";
		header("location:../dashboard/index.php?laporan");
	} else {
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=gagal");
}
