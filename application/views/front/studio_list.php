<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<div class="container">
			<div class="judul_text">
				<h1>studio list</h1>
			</div>
			<div class="mt-4">
				<a href="<?= site_url('Studio/add') ?>"><button class="btn btn-primary">Tambah Studio</button></a>
			</div>
			<?php
			$messsat = $this->session->flashdata('error');
			if (!empty($messsat)) { ?>
				<?= $this->session->flashdata('error'); ?>
			<?php } else { ?>
				<?= $this->session->flashdata('msg'); ?>
			<?php } ?>

			<div class="table-responsive mt-4 rdr">
				<table class="table overflow-hidden table-bordered rdr">
					<tr class="text-center">
						<th>No</th>
						<th>Nama Studio</th>
						<th>Fasilitas</th>
						<th>Harga</th>
						<th>Alat Musik</th>
						<th>Foto Studio</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php
					$i = 1;
					foreach ($studio as $stud) {
						?>
						<tr class="text-center">
							<td>
								<?= $i++ ?>
							</td>
							<td>
								<?= $stud->nama_studio ?>
							</td>
							<td>
								<?= $stud->fasilitas ?>
							</td>
							<td>
								<?= $stud->harga ?>
							</td>
							<td>
								<?= $stud->alat_musik ?>
							</td>
							<td class="text-start">
								<?= $stud->foto_studio ?>
							</td>
							<td> <button class="btn btn-primary"><a style="color: aliceblue; font-size: 16px;"
										href="<?= site_url('Studio/edit/' . $stud->id_studio) ?>">edit</a></button></td>
							<td> <button class="btn btn-primary"><a style="color: aliceblue; font-size: 16px;"
										href="<?= site_url('Studio/deleteStudio/' . $stud->id_studio) ?>">delete</a></button>
							</td>
						</tr>
						<?php
					} ?>
				</table>
			</div>
			<div class="paggination">
				<?= $this->pagination->create_links(); ?>
			</div>

		</div>
	</section>
</body>