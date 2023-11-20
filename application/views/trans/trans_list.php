<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
    <section>
        <div class="container">
            <div class="judul_text">
                <h1>waiting List</h1>
            </div>
            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive mt-4 rdr">
                <?php if (!empty($trans)) { ?>
                <table class="table overflow-hidden table-bordered rdr">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>User name</th>
                        <th>Tgl_booking</th>
                        <th>durasi</th>
                        <th>Grand total</th>
                        <th>Status</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
					   $i = 1;
					   foreach ($trans as $transaksi) {
						   ?>
                    <tr class="text-center">
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $transaksi->nama_studio ?>
                        </td>
                        <td>
                            <?= $transaksi->name ?>
                        </td>
                        <td>
                            <?= $transaksi->jam_mulai ?>
                            <?= $transaksi->tgl_booking ?>
                        </td>
                        <td>
                            <?= $transaksi->durasi ?> jam
                        </td>
                        <td>
                            <?= $transaksi->harga_booking ?>
                        </td>
                        <?php $done = 1;
							  if ($transaksi->status == $done) { ?>
                        <td>
                            <button class="btn btn_L" style="color: aliceblue;">LUNAS</button>
                        </td>
                        <?php } else { ?>
                        <td>
                            <button class="btn btn_B" style="color: aliceblue;">BELUM LUNAS</button>
                        </td>
                        <?php } ?>
                        <td> <button class="set-lunas">
                                <a href="<?= site_url('Transaksi/setlunas/' . $transaksi->id_wait) ?>">Set
                                    Lunas
                                </a>
                            </button>
                            <button class="detail-btn">
                                <a
                                    href="<?= site_url('Transaksi/trans_detail/' . $transaksi->id_wait . '/' . $transaksi->id_user) ?>">Detail</a>
                            </button>
                            <button type="button" class="detail-btn" style="color: aliceblue;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Delete
                            </button>

                        </td>
                    </tr>
                    <?php
					   } ?>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                apakah anda ingin menghapus data ini ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="detail-btn">
                                    <a href="<?= site_url('Transaksi/delete_wait/' . $transaksi->id_wait) ?>">Delete</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div>
                    <h1 class="text-center"> No data Available</h1>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>




</body>