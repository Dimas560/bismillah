<?php
session_start();
include '../../koneksi.php';

$kategori = $_POST['kategori_masakan'];
$nama = $_POST['nama_masakan'];
$harga = $_POST['harga_masakan'];



$query = "INSERT INTO tb_masakan (kategori_masakan, nama_masakan, harga_masakan) VALUES ('$kategori', '$nama', '$harga')";
$sql = mysqli_query($kon, $query);

if ($sql) {
    if ($kategori == "Makanan") {
        $_SESSION['pesan'] = '
            <div class="alert alert-success mb-2 alert-dismissible text-small" role="alert">
                menu berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>
            ';
        header('location:../index.php?makanan');
    } else {
        $_SESSION['pesan'] = '
            <div class="alert alert-success mb-2 alert-dismissible text-small" role="alert">
                menu berhasil ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>
        ';
        header('location:../index.php?minuman');
    }
} else {
    if ($kategori == "Makanan") {
        $_SESSION['pesan'] = '
                <div class="alert alert-danger mb-2 alert-dismissible text-small" role="alert">
                    <b>Gagal!</b> Data gagal ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                </div>
            ';
        header('location:../index.php?makanan');
    } else {
        $_SESSION['pesan'] = '
                <div class="alert alert-danger mb-2 alert-dismissible text-small" role="alert">
                    <b>Gagal!</b> Data gagal ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                </div>
            ';
        header('location:../index.php?minuman');
    }
}
