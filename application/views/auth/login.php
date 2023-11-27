<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head') ?>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="border-0 card my-5 o-hidden shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="bg-login-image col-lg-6 d-none d-lg-block"></div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4 text-gray-900">Welcome Back!</h1>

                                    </div>

                                    <?= $this->session->flashdata('message'); ?>

                                    <form action="<?= base_url('auth') ?>" class="user" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="email" name="email" placeholder="Email Address" type="text" value="<?= set_value('email') ?>">

                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="password" name="password" placeholder="Password" type="password">

                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>

                                        <button class="btn btn-block btn-primary btn-user" type="submit">
                                            Login
                                        </button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgot_password') ?>">Forgot Password?</a>
                                    </div>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register') ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/script') ?>
</body>

</html>