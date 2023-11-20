<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
    <section>
        <div class="container">

            <div class="judul_text">
                <a class="btn btn-primary mb-2" style="text-transform: none;"
                    href="<?=site_url('User/Getuser/'.$this->session->userdata('userid'))?>">Cancel</a>
                <h1>Change Pass</h1>
            </div>

            <?= $this->session->flashdata('msg') ?>
            <div>
                <form action="" method="post">
                    <div>
                        <label for="oldPass" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="oldPass" name="oldpassword">
                    </div>
                    <div>
                        <label for="newPass" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPass" name="newpassword">
                    </div>
                    <div>
                        <input type="submit" value="submit" class="btn btn-primary mt-4" name="submit">
                    </div>

                </form>
            </div>
        </div>

    </section>
</body>