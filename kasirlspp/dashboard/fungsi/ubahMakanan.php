<?php
session_start();
error_reporting(0);
include "../../koneksi.php";

$id = $_GET['id_masakan'];
$kategori = $_POST['kategori_masakan'];
$nama = $_POST['nama_masakan'];
$harga = $_POST['harga_masakan'];
$status = $_POST['status_masakan'];



if (move_uploaded_file($tmp, $path)) {
	$query = "SELECT * FROM tb_masakan WHERE id_masakan='$id'";
	$sql = mysqli_query($kon, $query);
	$data = mysqli_fetch_assoc($sql);



	$query = "UPDATE tb_masakan SET kategori_masakan='$kategori', nama_masakan='$nama', harga_masakan='$harga' WHERE id_masakan='$id'";
	$sql = mysqli_query($kon, $query);

	if ($sql) {
		$_SESSION['pesan'] = '
				<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
					<b>Berhasil!</b> Data berhasil diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
		header('location:../index.php?' . strtolower($kategori));
	} else {
		$_SESSION['pesan'] = '
				<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
					<b>Gagal!</b> Data gagal diubah
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
		header('location:../index.php?' . strtolower($kategori));
	}
} else {
	$query = "UPDATE tb_masakan SET kategori_masakan='$kategori', nama_masakan='$nama', harga_masakan='$harga' WHERE id_masakan='$id'";
	$sql = mysqli_query($kon, $query);

	if ($sql) {
		$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
				<b>Berhasil!</b> Data berhasil diubah
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?' . strtolower($kategori));
	} else {
		$_SESSION['pesan'] = '
			<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
				<b>Gagal!</b> Data gagal diubah
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?' . strtolower($kategori));
	}
}
