<div class="container mt-3">
  <?php if (isset($_SESSION['pesan'])) : ?>
    <?= $_SESSION['pesan'] ?>
  <?php unset($_SESSION['pesan']);
  endif; ?>

  <div class="card mb-3">
    <h3 class="mb-3 text-center">MAKANAN</h3>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row justify-content-center">
        <!-- mengambil data dari database -->
        <?php
        $query = "SELECT * FROM tb_masakan WHERE kategori_masakan='Makanan' ORDER BY id_masakan LIMIT 7";
        $sql = mysqli_query($kon, $query);
        while ($data = mysqli_fetch_array($sql)) :
        ?>
          <div class="col-lg-3 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="mb-1">



                </div>
                <h4 class="card-title"><?= $data['nama_masakan'] ?></h4>
                <?php
                $harga = $data['harga_masakan'];
                if ($_SESSION['level'] == "") {
                  $harga = $data['harga_masakan'] + 5000;
                }

                ?>
                <p class="card-text"><strong>Rp. <?= rupiah($harga) ?></strong></p>

                <button type="button" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#masakan_<?= $data['id_masakan']; ?>">
                  Pilih
                </button>


              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="masakan_<?= $data['id_masakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="fungsi/orderMakanan.php" method="POST">
                  <div class="modal-body">
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <input type="hidden" name="id_masakan" value="<?= $data['id_masakan'] ?>">
                        <div class="form-group">
                          <label>pesan</label>
                          <input type="text" readonly class="form-control" value="<?= $data['nama_masakan'] ?>">
                        </div>
                        <div class="form-group">
                          <label>RP.</label>
                          <input type="text" readonly class="form-control" value="<?= $data['harga_masakan'] ?>">
                        </div>
                        <div class="form-group">
                          <label>jumlah</label>
                          <input type="number" class="form-control" name="jumlah" value="1" min="1" max="20">
                        </div>
                        <div class="form-group">
                          <label>notes</label>
                          <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-dark">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <h3 class="mb-3 text-center">MINUMAN</h3>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row justify-content-center">
        <?php
        $query2 = "SELECT * FROM tb_masakan WHERE kategori_masakan='Minuman' ORDER BY id_masakan";
        $sql2 = mysqli_query($kon, $query2);
        while ($data = mysqli_fetch_array($sql2)) :
        ?>
          <div class="col-lg-3 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="mb-1">

                </div>
                <h4 class="card-title"><?= $data['nama_masakan'] ?></h4>
                <?php
                $hargi = $data['harga_masakan'];
                if ($_SESSION['level'] == "") {
                  $hargi = $data['harga_masakan'] + 3000;
                }
                ?>
                <p class="card-text"><strong>Rp. <?= rupiah($hargi) ?></strong></p>

                <button type="button" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#masakan_<?= $data['id_masakan']; ?>">
                  Pilih
                </button>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="masakan_<?= $data['id_masakan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="fungsi/orderMakanan.php" method="POST">
                  <div class="modal-body">
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <input type="hidden" name="id_masakan" value="<?= $data['id_masakan'] ?>">
                        <div class="form-group">
                          <label>pesan</label>
                          <input type="text" readonly class="form-control" value="<?= $data['nama_masakan'] ?>">
                        </div>
                        <div class="form-group">
                          <label>RP.</label>
                          <input type="text" readonly class="form-control" value="<?= $data['harga_masakan'] ?>">
                        </div>
                        <div class="form-group">
                          <label>jumlah</label>
                          <input type="number" class="form-control" name="jumlah" value="1" min="1" max="20">
                        </div>
                        <div class="form-group">
                          <label>notes</label>
                          <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-outline-dark">Tambah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

</div>