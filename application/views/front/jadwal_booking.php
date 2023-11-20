<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<div class="container">
			<div class="judul_text">
				<h1>jadwal booking</h1>
				<p style="color:red;">sebelum booking studio, dimohon melihat jadwal booking yang tersedia</p>
			</div>

			<?= $this->session->flashdata('msg'); ?>
			<div class="table-responsive mt-4 rdr">
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
								<?= $stud->tanggal ?>
						</td>
						<td>
								<?= $stud->jam ?>
						</td>
						<td>
								<?= $stud->durasi ?>
						</td>
					</tr>

						<?php
					} ?>
				</table>
				<div class="mb-3">
					<a href="<?= site_url('Booking/add/' . $this->session->userdata('userid')) ?>"><button
							class="btn btn-primary">booking
							Studio</button></a>
				</div>
			</div>
		</div>
	</section>
</body>