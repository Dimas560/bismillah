<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Meja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
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

        <!-- Form untuk Tambah Meja -->
        <h2>entri meja</h2>
        <form action="../fungsi/aksi.php" method="post">
            <label for="meja_id">ID Meja:</label>
            <input type="text" name="meja_id" id="meja_id" required><br><br>
            <label for="status">no meja(sesuai ID meja): </label>
            <input type="text" name="status" id="status" required><br><br>
            <button type="submit" name="tambah" style="background-color: #000; color: #fff; border: 2px solid #000;">Tambah Meja</button>

            <a href="../index.php?order">Kembali</a>
        </form>

        <!-- Tabel untuk Menampilkan Data Meja -->
        <h2>data meja</h2>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari ID Meja..">

        <table id="mejaTable">
            <tr>
                <th>ID Meja</th>

                <th>Aksi</th>
            </tr>
            <?php
            // Tampilkan data meja dari database
            include '../../koneksi.php';
            $query = "SELECT * FROM tb_meja";
            $result = mysqli_query($kon, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['meja_id'] . "</td>";

                // Tombol Hapus
                echo "<td><button onclick='hapusMeja(" . $row['meja_id'] . ")' style='background-color: #000; color: #fff; padding: 5px 10px; border: 1px solid #000; border-radius: 4px;'>Hapus</button></td>";

                echo "</tr>";
            }
            ?>


            <!-- Notifikasi untuk tombol Hapus -->
            <script>
                function hapusMeja(id) {
                    if (confirm('Apakah Anda yakin ingin menghapus meja ini?')) {
                        window.location.href = '../fungsi/hapus.php?id=' + id;
                    }
                }

                function searchTable() {
                    // Deklarasi variabel
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("searchInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("mejaTable");
                    tr = table.getElementsByTagName("tr");

                    // Loop melalui semua baris tabel, sembunyikan yang tidak cocok dengan pencarian
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0]; // Kolom ID Meja
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>

    </div>
</body>

</html>