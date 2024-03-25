<div class="container mt-3">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']);
    endif; ?>
    <div class="card">
        <div class="card-header">
            LAPORAN
        </div>
        <div class="card-body">
            <!-- Input untuk search bar -->
            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari No Order..">
            <a href="admin/semua_laporan.php" target="_blank" class="btn btn-outline-dark btn-sm mb-3">cetak semua <i class="fa fa-print"></i></a>
            <table id="laporanTable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Order</th>
                        <th>Meja</th>
                        <th>Waktu Transaksi</th>
                        <th>Total</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query awal untuk menampilkan semua data
                    $transaksi = mysqli_query($kon, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
                    // Lakukan perulangan untuk menampilkan data
                    $i = 1;
                    foreach ($transaksi as $row) :
                        $user_query =  mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$row[id_user]'");
                        $user = mysqli_fetch_assoc($user_query);
                        $order_query =  mysqli_query($kon, "SELECT * FROM tb_order WHERE id_order = '$row[id_order]'");
                        $oq = mysqli_fetch_assoc($order_query);
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['id_order'] ?></td>
                            <td><?= $oq['meja_order'] ?></td>
                            <td><?= date('d-m-Y H:i', $oq['tanggal_order']) ?></td>
                            <td>Rp. <?= rupiah($row['totbar_transaksi']) ?></td>
                            <td>
                                <a href="admin/print_struk.php?id_order=<?= $row['id_order'] ?>" target="_blank" class="btn btn-outline-dark btn-sm text-small"><i class="fas fa-print">CETAK</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("laporanTable");
        tr = table.getElementsByTagName("tr");

        // Loop melalui semua baris tabel, sembunyikan yang tidak cocok dengan pencarian
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Kolom No Order
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