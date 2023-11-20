<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
    <section>
        <div class="container">
            <div class="judul_text">
                <h1>history Transaksi</h1>
            </div>
            <div class="mt-4">
                <a href="<?= site_url('User/Getuser/' . $this->session->userdata('userid')) ?>"><button
                        class="btn btn-primary">back</button></a>
            </div>
            <?= $this->session->flashdata('msg'); ?>
            <div class="table-responsive mt-4 rdr">
                <table class="table rounded rounded-4 overflow-hidden table-bordered rdr">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Ruangan</th>
                        <th>Total</th>
                        <th>Durasi</th>
                        <th>Tgl-mulai</th>
                        <th colspan="2">Status</th>
                    </tr>
                    <?php
					$i = 1;
					foreach ($history as $his) {
						?>
                    <tr class="text-center">
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $his->nama_studio ?>
                        </td>
                        <td>
                            <?= $his->harga_booking ?>
                        </td>
                        <td>
                            <?= $his->durasi ?>
                        </td>
                        <td>
                            <?= $his->tgl_booking ?>
                            <?= $his->jam_mulai ?>
                        </td>
                        <td>
                            <?php $std = 1;
							   if ($his->status != $std) { ?>
                            <button id="changeBg" class="btn btn_B">
                                <a href="<?= site_url('User/detail_trans/' . $this->session->userdata('userid') . '/' . $his->status . '/' . $his->nama_studio) ?>"
                                    id="status">
                                    BELUM LUNAS
                                </a>
                            </button>
                            <?php } else { ?>
                            <button id="changeBg" class="btn btn_L">
                                <a href="<?= site_url('User/detail_trans/' . $this->session->userdata('userid') . '/' . $his->status . '/' . $his->nama_studio) ?>"
                                    id="status">
                                    LUNAS
                                </a>
                            </button>
                            <?php } ?>
                        </td>
                        <?php
					} ?>
                </table>
            </div>
        </div>

        </s ection>
</body>