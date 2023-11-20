<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
    <?php
	if (isset($transaksi)) {
		$idtrans = $transaksi->id_trans;
		$name = $transaksi->nama_studio;
		$iduser = $transaksi->id_user;
		$tanggalbook = $transaksi->tgl_booking;
		$jammulai = $transaksi->jam_mulai;
		$durasi = $transaksi->durasi;
		$harga = $transaksi->harga_booking;
		$status = $transaksi->status;
		$create = $transaksi->created_at;


		$invoce = $idtrans . $iduser . $durasi . $status . $create;

	}

	?>
    <section>
        <div class="container" id="printableArea">
            <div class="judul_text">
                <h1>INVOICE
                    <?= $invoce ?>
                </h1>
            </div>
            <div class="box_invoice">
                <div class="invoice_box">
                    <h5> INVOICE
                        <?= $invoce ?>
                    </h5>
                    <div class="table-responsive mt-4">
                        <table class="table table-borderless" style="border: none;">
                            <tr class="text-start">
                                <td>Dari</td>
                                <td>Kepada</td>
                                <td colspan="4">Tgl pesananan:
                                    <?= $create ?>
                                </td>
                            </tr>
                            <tr>
                                <td>STUDIM</td>
                                <td>
                                    <?= $iduser ?>
                                </td>
                                <?php $i = 1;
								if ($status == 1) { ?>
                                <td>
                                    Status : <strong>SUDAH LUNAS</strong>
                                </td>
                                <?php } else { ?>
                                <td>
                                    Status : <strong>BELUM LUNAS</strong>
                                </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Soekarno Hatta No.12 block B Komplek Mars</td>
                                <td>jl.laswi dekat pom bensi rumah No.05</td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive mt-4 mb-3 rdr">
                        <table class="table overflow-hidden table-bordered rdr">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Harga</th>
                                <th>Tgl-mulai</th>

                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <?php foreach ($price as $prc) { ?>
                                <td id="price">
                                    <?= $prc->harga ?>
                                </td>
                                <?php } ?>
                                <td>
                                    <?= $durasi ?>
                                </td>
                                <td>
                                    <?= $tanggalbook ?>
                                    <?= $jammulai ?>
                                </td>
                            </tr>
                            <tr class="table-secondary">
                                <th>Subtotal</th>
                                <th>Rp.</th>
                                <td colspan="3" id="subtotal" class="text-end" style="font-weight: bold;">

                                    <?= $harga ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <h5>Hormat kami,</h5>
                        <p>Operator</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>admin</p>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <button class="btn-back"> <a href="<?= site_url('Transaksi/report') ?>">Back</a></button>
                <button onclick="printPageArea('printableArea')" class="btn-print">print</button>
            </div>
    </section>



    <script>
    function printPageArea(areaID) {
        var printContent = document.getElementById(areaID).innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }

    const num = <?= $prc->harga ?>;
    const out = num.toLocaleString(["id"]);
    document.getElementById("price").innerHTML = out;

    console.log(out);

    const harga = <?= $harga ?>;
    const total = harga.toLocaleString(["id"]);
    document.getElementById("subtotal").innerHTML = total;
    document.getElementById("rekomen").innerHTML = "Jumlah yang harus Anda bayarkan adalah sebesar : Rp. " + total;
    </script>





</body>
