<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_meja WHERE meja_id='$id'";
    $result = mysqli_query($kon, $query);
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $meja_id = $_POST['meja_id'];
    $status = $_POST['status'];

    $query = "UPDATE tb_meja SET status='$status' WHERE meja_id='$meja_id'";
    $result = mysqli_query($kon, $query);

    if ($result) {
        header("Location: ../admin/data_meja.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($kon);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #000;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Meja</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="meja_id" value="<?php echo $data['meja_id']; ?>">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="<?php echo $data['status']; ?>" required><br><br>
            <button type="submit" name="edit">Simpan Perubahan</button>
        </form>
        <a href="../admin/data_meja.php">Kembali</a>
    </div>
</body>

</html>