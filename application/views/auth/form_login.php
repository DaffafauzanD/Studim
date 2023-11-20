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
    <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/css/style_login.css">
    <script src="<?php echo base_url('asset/bootstrap-5.3.0/js/bootstrap.bundle.min.js'); ?>"></script>
    <title>STUDIM</title>
</head>

<body>

    <section>
        <div class="bt-image" id="intro">
            <div class="container box_login">
                <form action="" method="post" class="login_box">
                    <div class="text-center head-login">
                        <h1>WElCOME TO STUDIM</h1>
                        <h3>LOG IN</h3>
                        <?= $this->session->flashdata('msg'); ?>
                        <?php if (!empty($this->session->flashdata('messagech'))) { ?>
                        <?= $this->session->flashdata('messagech'); ?>
                        <?php } else { ?>
                        <?= $this->session->flashdata('error'); ?>
                        <?php } ?>


                    </div>
                    <div class="mb-6 form_text">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="username">
                    </div>
                    <div class="mb-4 mt-3 form_text">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>

                    <input type="submit" class="btn btn-primary" value="login" name="login">
                    <div class="box_link">

                        <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="link_regis">Forgot
                            your password?</a>
                    </div>
                    <div class="box_link">
                        <a href="<?= site_url('Auth/register') ?>" class="link_regis">Don't have an account? Click Here
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Forgot Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="http://localhost/CI-studim/index.php/Auth/forgotPass">
                            <p style="color: red;">*Enter your email to verify your account</p>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="recipient-name" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" id="message-text" name="forgotpass">
                            </div>
                            <input type="submit" value="forgot" class="btn btn-primary mt-4" name="forgot">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

</body>





</html>
