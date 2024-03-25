<?php
session_start();
include '../../koneksi.php';
include '../fungsi/rupiah.php';
$laporan = mysqli_query($kon, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC")
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Print Laporan</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10 mx-auto mt-5">
        <div class="text-center">
          <h2>semua laporan</h2>
          <h5>Rumah Makan</h5>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>no</th>
                  <th>id order</th>
                  <th>tanggal</th>
                  <th>total</th>

                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($laporan as $row) :
                  $order_query =  mysqli_query($kon, "SELECT * FROM tb_order WHERE id_order = '$row[id_order]'");
                  $oq = mysqli_fetch_assoc($order_query);
                ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['id_order'] ?></td>
                    <td><?= date('d-m-Y H:i', $oq['tanggal_order']) ?></td>
                    <td>Rp. <?= rupiah($row['totbar_transaksi']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    window.print();
  </script>
</body>

</html>