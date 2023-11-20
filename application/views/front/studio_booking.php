<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section class="sectionmiddle">
		<div class="judul_text">
			<h1 style="text-align: center;">STUDIO LIST</h1>
		</div>
		<div class="card_box">
			<?php foreach ($studio as $stud) { ?>
				<div class="box_card">
					<p id="harga">harga Rp.
						<?= $stud->harga ?>
						per jam
					</p>
					<img src="<?php echo base_url('upload/studio/' . $stud->foto_studio) ?>" class="img_card" alt="">
					<h1>
						STUDIO
						<?= $stud->nama_studio ?>
					</h1>
					<button class="btn-booking">
						<a href="<?= site_url('Studio/studio_info/' . $stud->nama_studio) ?>">Lihat
							Selengkapnya
						</a>
					</button>
				</div>
			<?php } ?>

		</div>
	</section>
	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->view('slicer/footer')
		?>



</body>