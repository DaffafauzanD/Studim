<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<?php
	if (isset($studio)) {
		$name = $studio->nama_studio;
		$fasilitas = $studio->fasilitas;
		$harga = $studio->harga;
		$alatmusik = $studio->alat_musik;
		$deskripsi = $studio->deskripsi;
		$foto_studio = $studio->foto_studio;
	}
	?>
	<section>
		<div class="container">
			<div class="mt-4">
				<a href="<?= site_url('Booking') ?>"><button class="btn btn-primary">back</button></a>
			</div>
			<div class="judul_text">
				<h1>GALLERY</h1>
			</div>
			<div>
				<img class="gallery mx-auto d-block" src="<?php echo base_url('upload/studio/' . $foto_studio) ?>"
					alt="">
			</div>
			<div>
				<div class="body_text">
					<h3>Fasilitas</h3>
					<p>
						<?= $fasilitas ?>
					</p>
				</div>
				<div class="body_text">
					<h3>deskripsi</h3>
					<p>
						<?= $deskripsi ?>
					</p>
				</div>
				<div class="body_text">
					<h3>Price</h3>
					<p id="price">
						<?= $harga ?>
					</p>
				</div>
				<div class="body_text">
					<h3>Alat Musik</h3>
					<p>
						<?= $alatmusik ?>
					</p>
				</div>
			</div>
			<div class="judul_text">
				  <h2>jadwal booking</h2>
				  <p style="color:red;">sebelum booking studio, dimohon melihat jadwal booking yang tersedia</p>
			  </div>
			<div class="table-responsive mt-4 mb-3 rdr">
				<table class="table overflow-hidden table-bordered rdr">
					<tr class="text-center">
						<th>No</th>
						<th>Nama Studio</th>
						<th>tanggal</th>
						<th>jam</th>
						<th>durasi</th>
					</tr>
					<?php
					$i = 1;
					foreach ($sch as $stud) {
						if ($stud->nama_studio == $name) {
							?>
							<tr class="text-center">
								<td>
						 		<?= $i++ ?>
								</td>
								<td>
						 		<?= $stud->nama_studio ?>
								</td>
								<td>
						 		<?= $stud->tanggal ?>
								</td>
								<td>
						 		<?= $stud->jam ?>
								</td>
								<td>
						 		<?= $stud->durasi ?> jam
							 </td>
						 </tr>

				 		<?php
						}
					} ?>
				</table>
			</div>
			<div class="mb-5">
			   <button class="btn_booking"><a
					   href="<?= site_url('Booking/add/' . $this->session->userdata('userid') . '/' . $name . '/' . $harga) ?>">Booking</a></button>
		   </div>
		</div>
	</section>

	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->view('slicer/footer');
	?>

	<script>
		const num = <?= $harga ?>;
		const out = num.toLocaleString(["id"]);
		document.getElementById("price").innerHTML = "Rp. " + out + " per jam";
	</script>
</body>
