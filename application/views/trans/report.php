<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
    <section>

        <div class="container" id="printableArea">
            <div class="judul_text">
                <h1>report summary</h1>
            </div>

            <div class="box-report mt-3">
                <div class="report-card shadow">
                    <h3>Transaksi masuk</h3>
                    <h1>
                        <?php echo $count ?>
                    </h1>
                </div>
                <div class="report-card shadow">
                    <h3>total pendapatan</h3>
                    <h1 id="price">
                    </h1>
                </div>
            </div>

            <div class="table-responsive mt-4 rdr">
                <table class="table overflow-hidden table-bordered rdr">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Studio</th>
                        <th>Nama User</th>
                        <th>tgl-booking</th>
                        <th>durasi</th>
                        <th>total</th>
                        <th>aksi</th>
                    </tr>
                    <?php $i = 1;
					foreach ($report as $rep) { ?>
                    <tr class="text-center">
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $rep->nama_studio ?>
                        </td>
                        <td>
                            <?= $rep->name ?>
                        </td>
                        <td>
                            <?= $rep->tgl_booking ?>
                            <?= $rep->jam_mulai ?>
                        </td>
                        <td>
                            <?= $rep->durasi ?>
                        </td>
                        <td>
                            <?= number_format($rep->harga_booking, 1) ?>
                        </td>
                        <td>
                            <button class="detail-btn">
                                <a
                                    href="<?= site_url('Transaksi/detail/' . $rep->id_trans . '/' . $rep->status . '/' . $rep->nama_studio) ?>">
                                    Detail
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="paggination">
                <?= $this->pagination->create_links(); ?>
            </div>
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
    let sum = <?= $total_sales ?>;

    const out = sum.toLocaleString(["id"]);
    document.getElementById("price").innerHTML = "Rp. " + out;
    </script>

</body>