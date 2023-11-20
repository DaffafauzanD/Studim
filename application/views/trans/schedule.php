<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>

		<div class="container">

			<div class="judul_text">
				<h1>schedule List</h1>
			</div>
			<div>
				<form method="post" action="<?= site_url('Transaksi/schedule') ?>">
					<input type="text" name="search_query" placeholder="Enter your
						search query" value="<?= $searchQuery ?>">
					<button type="submit">Search</button>
				</form>
			</div>
			<?= $this->session->flashdata('msg') ?>
			<div class="table-responsive mt-4 rdr">
				<table class="table overflow-hidden table-bordered rdr">
					<tr class="text-center">
						<th>No</th>
						<th>Nama Ruangan</th>
						<th>Tgl_booking</th>
						<th>durasi</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php
					$i = 1;

					foreach ($schedule as $sch) {
						?>
						<tr class="text-center">
							<td>
								<?= $i++ ?>
							</td>
							<td>
								<?= $sch->nama_studio ?>
							</td>
							<td>
								<?= $sch->jam ?>
								<?= $sch->tanggal ?>
							</td>
							<td>
								<?= $sch->durasi ?> jam
							</td>
							<td>
								<button class="btn btn_L" style="color: aliceblue; background:#E26969;"><a
										href="<?= site_url("Transaksi/delete_sch/" . $sch->id_schedule) ?>">Delete</a></button>
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