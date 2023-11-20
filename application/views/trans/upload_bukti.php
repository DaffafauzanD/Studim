<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('slicer/navbar');
?>

<body>
	<div>
		<div class="container mt-5">
			<form class="" method="post" enctype="multipart/form-data">
				<h1>Bukti Transfer</h1>
				<?= $this->session->flashdata('msg') ?>
				<div>
					<p class="lead"><strong>Syarat Upload</strong></p>
					<ul>
						<li>Format gambar : jpg,png,Jpeg</li>
						<li>Ukuran max-file : 2.00MB </li>
						<li>max lebar/tinggi : 2000x2000</li>
					</ul>
				</div>
				<div style="color:red;">
					<?= $error ?>
				</div>
				<div style="color: red;">
					<?= validation_errors() ?>
				</div>
				<div class="mb-3">
					<input class="form-control" type="file" id="formFile" name="photo">
				</div>
				<input type="submit" value="UPLOAD PHOTO" class="btn btn-primary" name="upload">
			</form>
			<a class="btn btn-primary mt-3"
				href="<?= site_url('User/history/' . $this->session->userdata('userid')) ?>">CANCEL</a>
		</div>
	</div>
</body>