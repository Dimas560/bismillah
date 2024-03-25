<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $meja_id = $_POST['meja_id'];
    $status = $_POST['status'];

    $query = "INSERT INTO tb_meja (meja_id, status) VALUES ('$meja_id', '$status')";
    $result = mysqli_query($kon, $query);

    if ($result) {
        header("Location: ../admin/data_meja.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($kon);
    }
}
