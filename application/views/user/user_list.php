<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<section>
		<div class="container">
			<div class="judul_text">
				<h1>user list</h1>
			</div>
			<div class="mt-4">
				<a href="<?= site_url('User/add') ?>"><button class="btn btn-primary">Tambah User</button></a>
			</div>
			<?= $this->session->flashdata('msg'); ?>
			<div class="table-responsive mt-4 rdr">
				<table class="table overflow-hidden table-bordered rdr">
					<tr class="text-center">
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>No telp</th>
						<th>Usertype</th>
						<th>Username</th>
						<th>Gender</th>
						<th>Alamat</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php
					$i = 1;
					foreach ($user as $stud) {
						?>
						<tr class="text-center">
							<td>
								<?= $i++ ?>
							</td>
							<td>
								<?= $stud->name ?>
							</td>
							<td>
								<?= $stud->email ?>
							</td>
							<td>
								<?= $stud->no_telp ?>
							</td>
							<td>
								<?= $stud->user_type ?>
							</td>
							<td>
								<?= $stud->username ?>
							</td>
							<td>
								<?= $stud->gender ?>
							</td>
							<td>
								<?= $stud->alamat ?>
							</td>
							<td> <button class="btn btn-primary"><a
										href="<?= site_url('User/edit/' . $stud->user_id) ?>">edit</a></button></td>
							<td> <button class="btn btn-primary"><a
										href="<?= site_url('User/delete/' . $stud->user_id) ?>">delete</a></button></td>
						</tr>
						<?php
					} ?>
				</table>
				<div class="paggination">
					<?= $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</section>


</body>