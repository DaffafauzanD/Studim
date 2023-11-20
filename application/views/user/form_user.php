<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<?php
		$name = "";
		$email = "";
		$notelp = "";
		$username = "";
		$userType = "";
		$gender = "";
		$alamat = "";

		if (isset($user)) {
			$name = $user->name;
			$email = $user->email;
			$notelp = $user->no_telp;
			$username = $user->username;
			$userType = $user->user_type;
			$gender = $user->gender;
			$alamat = $user->alamat;
		}
		?>
		<div class="container">
			<div class="judul_text">
				<h1>user list</h1>
				<h3>user form</h3>
			</div>
			<div class="mt-4">
				<a href="<?= site_url('User') ?>"><button class="btn btn-primary">back</button></a>
			</div>
			<div class="mt-4">
				<form action="" method="post" class="row g-3">
					<div class="col-12">
						<label for="" class="form-label">Nama</label>
						<input type="text" class="form-control" name="name" value="<?= $name ?>">
					</div>
					<div class="col-12">
						<label for="" class="form-label">Email</label>
						<input type="text" class="form-control" name="email" value="<?= $email ?>">
					</div>
					<div class="col-6">
						<label for="" class="form-label">Gender</label>
						<select class="form-select" aria-label="Default select example" name="gender">
							<option value="Pria" <?= set_select('gender', 'Pria', $gender == 'Pria' ? true : false) ?>>
								Pria
							</option>
							<option value="Wanita" <?= set_select('gender', 'Wanita', $gender == 'Wanita' ? true : false) ?>>Wanita
							</option>
						</select>
					</div>
					<div class="col-6">
						<label for="" class="form-label">No telp</label>
						<input type="text" class="form-control" name="no_telp" value="<?= $notelp ?>">
					</div>
					<div class="col-6">
						<label for="" class="form-label">User type</label>
						<select class="form-select" aria-label="Default select example" name="user_type">
							<option selected>Choose type user</option>
							<option value="Member" <?= set_select('user_type', 'Member', $userType == 'Member' ? true : false) ?>>Member
							</option>
							<option value="Admin" <?= set_select('user_type', 'Admin', $userType == 'Admin' ? true : false) ?>>Admin
							</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="" class="form-label">Username</label>
						<input class="form-control" name="username" value="<?= $username ?>">
					</div>
					<div class="col-md-6">
						<label for="" class="form-label">Alamat</label>
						<textarea class="form-control" id="" cols="1" rows="3" name="alamat"><?= $alamat ?></textarea>
					</div>
					<div>
						<input type="submit" value="Submit" class="btn btn-primary mt-4" name="submit">
						<input type="reset" value="Reset" name="reset" class="btn btn-primary mt-4">
					</div>
				</form>
			</div>
		</div>
	</section>



</body>