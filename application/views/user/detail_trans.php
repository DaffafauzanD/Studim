<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('slicer/navbar');
?>

<body>
	<?php
	if (isset($transaksi)) {
		$name = $transaksi->nama_studio;
		$iduser = $transaksi->id_user;
		$tanggalbook = $transaksi->tgl_booking;
		$jammulai = $transaksi->jam_mulai;
		$durasi = $transaksi->durasi;
		$harga = $transaksi->harga_booking;
		$status = $transaksi->status;
		if ($status == 0) {
			$idwait = $transaksi->id_wait;
		} else {
			$idwait = $transaksi->id_trans;
		}
		$create = $transaksi->created_at;


		$invoce = $iduser . $durasi . $status . $create;

	}


	?>
	<section>

		<div class="container">
			<div class="judul_text">
				<h1>Transaksi selesai</h1>
				<div>
					<?php $i = 1;
					if ($status == $i) { ?>
					   <h5>invoice no.
					   	<?= $invoce ?> <strong style="color: green;">(LUNAS)</strong>
					   </h5>
					<?php } else { ?>
					   <h5>invoice no.
					   	<?= $invoce ?> <strong style="color: red;">(BELUM LUNAS)</strong>
					   </h5>
					<?php } ?>
					<a class="btn btn-primary "
						href="<?= site_url('User/history/' . $this->session->userdata('userid')) ?>">CANCEL</a>
				</div>
			</div>

			<div>
				<div class="table-responsive mt-4 rdr">
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
								<?= $name ?>
							</td>
							<?php foreach ($price as $prc) { ?>
							   <td id="price">
							   	<?= $prc->harga ?>
							   </td>
							<?php } ?>
							<td>
								<?= $durasi ?>
							</td>
							<td>
								<?= $tanggalbook ?>
							</td>
						</tr>
						<tr>
							<th>Subtotal</th>
							<th>Rp.</th>
							<td colspan="3" id="subtotal" class="text-end" style="font-weight: bold;">

								<?= $harga ?>

							</td>
						</tr>
					</table>
				</div>
				<hr>
				<div>
					<h5>PEMBAYARAN</h5>
				</div>
				<hr>
				<div>
					<p>Anda dapat melakukan pembayaran melalui nomor rekening kami dibawah ini:</p>
				</div>
				<div class="table-responsive mt-4">
					<table class="table table-bordered">
						<tr class="text-center">
							<th>No</th>
							<th>Bank</th>
							<th>Atas nama</th>
							<th>No rekening</th>
						</tr>
						<tr class="text-center">
							<td>1</td>
							<td>BRI</td>
							<td>STUDIM</td>
							<td>09321-03912-3213</td>
						</tr>
						<tr class="text-center">
							<td>1</td>
							<td>BNI</td>
							<td>STUDIM</td>
							<td>09321-03912-3213</td>
						</tr>
						<tr class="text-center">
							<td>1</td>
							<td>Mandiri</td>
							<td>STUDIM</td>
							<td>09321-03912-3213</td>
						</tr>
						<tr class="text-center">
							<td>1</td>
							<td>BCA</td>
							<td>STUDIM</td>
							<td>09321-03912-3213</td>
						</tr>
					</table>
				</div>
				<hr>
				<div>
					<h5>PEMBAYARAN</h5>
				</div>
				<hr>
				<?php if ($status == 1) { ?>

				<?php } else { ?>
				   <div class="btn_upload">
					   <button><a href="<?= site_url('Transaksi/upload_trans/' . $iduser . '/' . $idwait) ?>">Upload Bukti
							   Transaksi</a></button>
				   </div>
				<?php } ?>
				<div class="req">
					<ul>
						<li>Segera lakukan pembayaran sebelum:
							<?= $tanggalbook ?> | 24H WIB, apabila melewati
							batas waktu
							tersebut maka booking dianggap batal.
						</li>
						<li id="rekomen">

						</li>
						<li>Silahkan melakukan konfirmasi pembayaran ke halaman berikut ini, atau
							menghubungi kami ke customer service yang telah disediakan dan melampirkan foto bukti
							bayarnya.</li>
						<li>Kami akan segera memproses pemesanan Anda setelah mendapatkan konfirmasi pembayaran segera
							mungkin.</li>
					</ul>
				</div>
			</div>
	</section>

	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->view('slicer/footer');
	?>

	<script>
	const num = <?= $prc->harga ?>;
	const out = num.toLocaleString(["id"]);
	document.getElementById("price").innerHTML = out;

	const harga = <?= $harga ?>;
	const total = harga.toLocaleString(["id"]);
	document.getElementById("subtotal").innerHTML = total;
	document.getElementById("rekomen").innerHTML = "Jumlah yang harus Anda bayarkan adalah sebesar : Rp. " + total;
	</script>



</body>
