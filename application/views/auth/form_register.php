<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('asset/bootstrap-5.3.0/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/css/style_regis.css">
	<script src="<?php echo base_url('asset/bootstrap-5.3.0/js/bootstrap.bundle.min.js'); ?>"></script>
	<title>STUDIM</title>
</head>

<body>

	<section>
		<div class="bt-image" id="intro">
			<div class="container box_login">
				<form action="" method="post" class="row g-3 login_box">
					<div class="text-center head-login">
						<h1>WElCOME TO STUDIM</h1>
						<h3>REGISTER</h3>
						<?= $this->session->flashdata('msg'); ?>
					</div>
					<div class="col-md-6 form_text">
						<label for="exampleInputEmail1" class="form-label">name</label>
						<input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp"
							name="name">
					</div>
					<div class="col-md-6 form_text">
						<label for="inputState" class="form-label">Gender</label>
						<select id="inputState" class="form-select" name="gender">
							<option selected>Choose...</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
						</select>
					</div>
					<div class="col-md-6 mt-3 form_text">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password">
					</div>
					<div class="col-md-6 form_text">
						<label for="" class="form-label">Alamat</label>
						<textarea class="form-control" id="" cols="1" rows="1" name="alamat"></textarea>
					</div>
					<div class="col-12 mt-3 form_text">
						<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="cpassword">
					</div>
					<div class="col-12 form_text">
						<label for="exampleInputEmail1" class="form-label">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
							name="email">
					</div>
					<div class="col-mb-6 form_text">
						<label for="exampleInputEmail1" class="form-label">Username</label>
						<input type="text" class="form-control" id="exampleInputusername" aria-describedby="emailHelp"
							name="username">
					</div>

					<input type="submit" class="btn btn-primary" value="Register" name="submit">
					<div class="box_link">
						<a href="<?= site_url('Auth/login') ?>" class="link_regis">Have Account? Go back to login</a>
					</div>
				</form>
			</div>
		</div>

	</section>

</body>


</html>