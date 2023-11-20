<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('slicer/navbar');
?>



<body class="body_home">
	<section class="sectionupper">
		<div class="backcolor">
			<div class="container">
				<div class="boxcontain">
					<div class="judul">
						<h1>tempat terbaik untuk jamming bersama teman musik mu</h1>
					</div>
					<div class="content_text">
						<p>Kita memberikan pengalaman terbaik untuk pemain musik yang ingin mengasah skill nya
							dipanggung
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="image-container">
			<img src="<?= base_url('asset/image/IMG_32731.jpg') ?>" class="imageback" alt="">
		</div>
	</section>

	<section class="sectionmiddle">
		<div class="container">
			<div class="text_page">
				<div class="judul_text">
					<h1>ABOUT US</h1>
				</div>
				<p>Studim merupakan studio musik di Bandung yang paling banyak diminati
					oleh para musisi
					dan remaja, dari pakar hingga pemula. tidak hanya itu, studio
					musik yang
					besar dan nyaman dan juga menggunakan peralatan
					profesional untuk pengalaman hebat
					seperti dipanggung besar,
					kami selalu memprioritaskan
					kenyamanan
					pelanggan dari layanan kami</p>
				<div class="judul_text">
					<h1>PREVIEW OUR STUDIO</h1>
				</div>
				<div class="box_image">
					<div class="con_image"><img src="<?= base_url('asset/image/IMG_32731.jpg') ?>"
							class="img-fluid image_preview" alt=""></div>
					<div class="con_image"><img src="<?= base_url('asset/image/image.jpg') ?>"
							class="img-fluid image_preview" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$this->load->view('slicer/footer')
		?>

</body>