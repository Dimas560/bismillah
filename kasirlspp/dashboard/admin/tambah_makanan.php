<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<strong>Tambah Makanan</strong>
				</div>
				<div class="card-body">
					<form action="fungsi/tambahMakanan.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label" for="kategori_masakan">Kategori Masakan</label>
							<select required name="kategori_masakan" id="kategori_masakan" class="form-control">
								<option value="Makanan">Makanan</option>
								<option value="Minuman">Minuman</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="nama_masakan">Nama Makanan</label>
							<input required type="text" class="form-control" id="nama_masakan" name="nama_masakan">
						</div>
						<div class="form-group">
							<label class="form-label" for="harga_masakan">Harga</label>
							<input required type="number" class="form-control" id="harga_masakan" name="harga_masakan" min="0">
						</div>


						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>