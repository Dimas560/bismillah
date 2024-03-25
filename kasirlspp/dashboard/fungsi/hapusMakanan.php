<?php
include "../../koneksi.php";
session_start();

// ambil data
$id = $_GET['id_masakan'];
$query = "SELECT * FROM tb_masakan WHERE id_masakan='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);
$kategori = $data['kategori_masakan'];

// menghapus data
$query2 = "DELETE FROM tb_masakan WHERE id_masakan='$id'";
$sql2 = mysqli_query($kon, $query2);

if ($sql2) {
	if ($kategori == "Makanan") {
		$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
				data berhasil dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?makanan');
	} else {
		$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			 data berhasil dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?minuman');
	}
} else {
	if ($kategori == "Makanan") {
		$_SESSION['pesan'] = '
			<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
				Data gagal dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?makanan');
	} else {
		$_SESSION['pesan'] = '
			<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
				 Data gagal dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?minuman');
	}
}
