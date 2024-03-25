<?php
$id = $_GET['ubah_makanan'];
$query = "SELECT * FROM tb_masakan WHERE id_masakan='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);

if ($data['kategori_masakan'] == "Makanan") {
	$kategori = "Makanan";
} else {
	$kategori = "Minuman";
}
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<strong>Ubah <?= $kategori; ?></strong>
				</div>
				<div class="card-body">
					<form action="fungsi/ubahMakanan.php?id_masakan=<?= $data['id_masakan'] ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label" for="kategori_masakan">Kategori</label>
							<select name="kategori_masakan" id="kategori_masakan" class="form-control">
								<?php
								if ($data['kategori_masakan'] == "Makanan") {
									$selected = "Selected";
								} elseif ($data['kategori_masakan'] == "Minuman") {
									$select = "Selected";
								}
								?>
								<option value="Makanan" <?= $selected; ?>>Makanan</option>
								<option value="Minuman" <?= $select; ?>>Minuman</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="nama_masakan">Nama <?= $kategori; ?></label>
							<input type="text" class="form-control" id="nama_masakan" name="nama_masakan" value="<?= $data['nama_masakan'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="harga_masakan">Harga</label>
							<input type="number" class="form-control" id="harga_masakan" name="harga_masakan" min="0" value="<?= $data['harga_masakan'] ?>">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>