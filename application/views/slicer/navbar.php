<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('slicer/header');
?>

<head>
    <nav class="navbar navbar-expand-lg headnav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">STUDIM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end dropbro" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url() ?>">HOME</a>
                    </li>
                    <?php if ($this->session->userdata('usertype') == 'Admin') { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ADMIN
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Studio') ?>">Studio List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('User') ?>">User List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Transaksi') ?>">Waiting List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Transaksi/schedule') ?>">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Transaksi/report') ?>">Report</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('usertype') == 'Member') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Booking') ?>">STUDIO</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Auth/logout') ?>">LOGOUT</a>
                    </li>

                </ul>
                <div class="profile">
                    <a href="<?= site_url('User/Getuser/' . $this->session->userdata('userid')) ?>"><img
                            src="<?= base_url('asset/image/profile.png') ?>" alt=""></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- <nav class="navbar navbar-expand-lg headnav">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">STUDIM</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar dropbro" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url() ?>">HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('Booking') ?>">STUDIO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('Auth/logout') ?>">LOGOUT</a>
					</li>
					<?php if ($this->session->userdata('usertype') == 'Admin') { ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							ADMIN
						</a>
						<ul class="dropdown-menu">
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('Studio') ?>">Studio List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('User') ?>">User List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('Transaksi') ?>">Waiting List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('Transaksi/schedule') ?>">Schedule</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= site_url('Transaksi/report') ?>">Report</a>
							</li>
						</ul>
					</li>
					<?php } ?>
				</ul>
				<div class="profile">
					<a href="<?= site_url('User/Getuser/' . $this->session->userdata('userid')) ?>"><img
							src="<?= base_url('asset/image/profile.png') ?>" alt=""></a>
				</div>

			</div>
		</div>
	</nav> -->
</head>