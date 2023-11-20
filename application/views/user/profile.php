<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<?php
		if (isset($profile)) {
			$name = $profile->name;
			$email = $profile->email;
			$no_telp = $profile->no_telp;
			$username = $profile->username;
			$gender = $profile->gender;
			$alamat = $profile->alamat;
			$photo = $profile->foto;
		}
		?>
		<div class="container">
			<div class="judul_text">
				<h1 style="text-decoration: underline;">YOUR PROFILE</h1>
			</div>
			<?= $this->session->flashdata('messagech') ?>
			<div class="box_profile">
				<div class="profile_info">
					<div class="info_profile">
						<p for="">Name</p>
						<div class="border_text">
							<p>
								<?= $name ?>
							</p>
						</div>
					</div>
					<div class="info_profile">
						<p for="">Email</p>
						<div class="border_text">
							<p>
								<?= $email ?>
							</p>
						</div>
					</div>
					<div class="info_profile">
						<p for="">Phone Number</p>
						<div class="border_text">
							<p>
								<?= $no_telp ?>
							</p>
						</div>
					</div>
					<div class="info_profile">
						<p for="">Username</p>
						<div class="border_text">
							<p>
								<?= $username ?>
							</p>
						</div>
					</div>
					<div class="info_profile">
						<p for="">Gender</p>
						<div class="border_text">
							<p>
								<?= $gender ?>
							</p>
						</div>
					</div>
					<div class="info_profile">
						<p for="">Address</p>
						<div class="border_text">
							<p>
								<?= $alamat ?>
							</p>
						</div>
					</div>
				</div>
				<div class="button_profile">
					<div>
						<img class="img_profile mt-5" src="<?php echo base_url('upload/user/' . $photo) ?>" alt="">

					</div>

					<div class="btn_box mt-3">
						<button class="btn button-pro"><a
								href="<?= site_url('User/history/' . $this->session->userdata('userid')) ?>">History</a></button>
					</div>
					<div class="btn_box">
						<button class="btn button-pro"><a href="<?= site_url('User/changepass') ?>">Change
								Password</a></button>
					</div>
					<div class="btn_box">
						<button type="button" class="btn" style="color: aliceblue;" data-bs-toggle="modal"
							data-bs-target="#exampleModal" data-bs-whatever="@fat">Change Photo</button>
					</div>
					<div class="btn_box ">
						<button class="btn button-pro"><a href="<?= site_url('user/profile_edit') ?>">Edit
								Profile</a></button>
					</div>
					<div>
						Part of
						<strong>
							<?= $this->session->userdata('usertype') ?>
						</strong> Studim
					</div>
				</div>
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Change Photo</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="post" action="../changePhoto" enctype="multipart/form-data">
								<?= validation_errors() ?>
								<div>
									<p class="lead"><strong>Syarat Upload</strong></p>
									<ul>
										<li>Format gambar : jpg,png,Jpeg</li>
										<li>Ukuran max-file : 2.00MB </li>
										<li>max lebar/tinggi : 2000x2000</li>
									</ul>
								</div>
								<div class="mb-3">
									<label for="formFile" class="form-label">Photo profile</label>
									<input class="form-control" type="file" id="formFile" name="photo">
								</div>

								<div>
									<input type="submit" value="submit" class="btn btn-primary mt-4" name="submit">
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<img class="img_profile rounded mx-auto d-block"
								src="<?php echo base_url('upload/user/' . $photo) ?>" alt="">
						</div>
					</div>
				</div>
			</div>


	</section>

</body>
