<?php
include '../../koneksi.php';

$message = '';

if (isset($_GET['id'])) {
    $id_meja = $_GET['id'];

    $query = "DELETE FROM tb_meja WHERE meja_id='$id_meja'";
    $result = mysqli_query($kon, $query);

    if ($result) {
        header("Location: ../admin/data_meja.php");
        exit();
    } else {
        $message = "Error: " . mysqli_error($kon);
    }
}
