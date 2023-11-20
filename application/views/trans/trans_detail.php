<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('slicer/navbar');
?>

<body>
	<div>
		<?php
		if (isset($detail)) {
			$idwait = $detail->id_wait;
			$name = $detail->nama_studio;
			$iduser = $detail->id_user;
			$nama = $detail->name;
			$namaStud = $detail->nama_studio;
			$hargaStud = $detail->harga;

			if (isset($bukti)) {
				$gambar = $bukti->bukti_gambar;
			} else {
				// Handle the case where $bukti is not set or null
				$gambar = ""; // or any default value
			}
			$tanggalbook = $detail->tgl_booking;
			$jammulai = $detail->jam_mulai;
			$durasi = $detail->durasi;
			$harga = $detail->harga_booking;
			$status = $detail->status;
			$create = $detail->created_at;


			$invoce = $iduser . $durasi . $status . $create;

		}
		?>

	</div>
	<section>
		<div class="container" id="printableArea">
			<div class="judul_text">
				<h1>INVOICE
					<?= $invoce ?>
				</h1>
			</div>
			<div class="box_invoice">
				<div class="invoice_box">
					<h5> INVOICE
						<?= $invoce ?>
					</h5>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" style="border: none;">
							<tr class="text-start">
								<td>Dari</td>
								<td>Kepada</td>
								<td colspan="4">Tgl pesananan:
									<?= $create ?>
								</td>
							</tr>
							<tr>
								<td>STUDIM</td>
								<td>
									<?= $nama ?>
								</td>
								<?php $i = 1;
								if ($status == 1) { ?>
									<td>
										Status : <strong>SUDAH LUNAS</strong>
									</td>
								<?php } else { ?>
									<td>
										Status : <strong>BELUM LUNAS</strong>
									</td>
								<?php } ?>
							</tr>
							<tr>
								<td>Soekarno Hatta No.12 block B Komplek Mars</td>
								<td>jl.laswi dekat pom bensi rumah No.05</td>
							</tr>
						</table>
					</div>
					<div class="table-responsive mt-4 mb-3 rdr">
						<table class="table overflow-hidden table-bordered rdr">
							<tr class="text-center">
								<th>No</th>
								<th>Nama Ruangan</th>
								<th>Harga</th>
								<th>Durasi</th>
								<th>Tgl-mulai</th>

							</tr>
							<tr class="text-center">
								<td>1</td>
								<td>
									<?= $namaStud ?>
								</td>
								<td id="price">
									<?= $hargaStud ?>
								</td>
								<td>
									<?= $durasi ?> jam
								</td>
								<td>
									<?= $tanggalbook ?>
									<?= $jammulai ?>
								</td>
							</tr>
							<tr class="table-secondary">
								<th>Subtotal</th>
								<th>Rp.</th>
								<td colspan="3" id="subtotal" class="text-end" style="font-weight: bold;">
									<?= $harga ?>
								</td>
							</tr>
						</table>
					</div>
					<div class="bukti-upload">
						<div>
							<h5>Hormat kami,</h5>
							<p>Operator</p>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<p>admin</p>
						</div>
						<div>
							<h4>Bukti Upload</h4>
							<p>Create at
								<?= $create ?>
							</p>
							<?php if ($gambar == null) { ?>
								<p style="color: red;">Belum upload bukti transaksi</p>
							<?php } else { ?>
								<img class="image-detail mb-3" src="<?= base_url('upload/trans/' . $gambar) ?>" alt="">
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-box mb-5">
				<button class="btn-back"> <a href="<?= site_url('Transaksi') ?>">Back</a></button>
				<button onclick="printPageArea('printableArea')" class="btn-print">print</button>
			</div>
	</section>



	<script>
		function printPageArea(areaID) {
			var printContent = document.getElementById(areaID).innerHTML;
			var originalContent = document.body.innerHTML;
			document.body.innerHTML = printContent;
			window.print();
			document.body.innerHTML = originalContent;
		}

		const num = <?= $hargaStud ?>;
		const out = num.toLocaleString(["id"]);
		document.getElementById("price").innerHTML = out;

		console.log(out);

		const harga = <?= $harga ?>;
		const total = harga.toLocaleString(["id"]);
		document.getElementById("subtotal").innerHTML = total;
	</script>


</body>