<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<?php
		$name = "";
		$fasilitas = "";
		$price = "";
		$alatMusik = "";
		$deskripsi = "";
		$foto_studio = "";

		if (isset($studio)) {
			$name = $studio->nama_studio;
			$fasilitas = $studio->fasilitas;
			$price = $studio->harga;
			$alatMusik = $studio->alat_musik;
			$deskripsi = $studio->deskripsi;
			$foto_studio = $studio->foto_studio;
		}
		?>
		<div class="container">
			<div class="judul_text">
				<h1>studio list</h1>
				<h3>studio form</h3>
			</div>

			<div class="mt-4">
				<a href="<?= site_url('Studio') ?>"><button class="btn btn-primary">back</button></a>
			</div>
			<div class="mt-4">
				<form action="" method="post" class="row g-3" enctype="multipart/form-data">
					<?= validation_errors() ?>
					<div class="col-12">
						<label for="" class="form-label">Nama Studio</label>
						<input type="text" class="form-control" value="<?= $name ?>" name="nama_studio">
					</div>
					<div class="col-12">
						<label for="" class="form-label">Fasilitas</label>
						<input type="text" class="form-control" value="<?= $fasilitas ?>" name="fasilitas">
					</div>
					<div class="col-12">
						<label for="" class="form-label">Price</label>
						<input type="number" min="1000" class="form-control" value="<?= $price ?>" placeholder="$"
							name="harga">
					</div>
					<div class="col-6">
						<label for="" class="form-label">Alat musik</label>
						<textarea class="form-control" id="" cols="1" rows="3"
							name="alat_musik"><?= $alatMusik ?></textarea>
					</div>
					<div class="col-md-6">
						<label for="" class="form-label">Deskripsi</label>
						<textarea class="form-control" id="" cols="1" rows="3"
							name="deskripsi"><?= $deskripsi ?></textarea>
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Photo studio</label>
						<input class="form-control" type="file" id="formFile" name="foto_studio">
					</div>
					<div>
						<input type="submit" value="Submit" class="btn btn-primary mt-4" name="submit">
						<input type="reset" value="Reset" name="reset" class="btn btn-primary mt-4">
					</div>
				</form>
			</div>
		</div>
		</s ection>
</body>
