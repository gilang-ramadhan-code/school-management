<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head') ?>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="border-0 card o-hidden my-5 shadow-lg">
            <div class="card-body p-0">
                <div class="row">
                    <div class="bg-register-image col-lg-5 d-none d-lg-block"></div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 mb-4 text-gray-900">Create an Account!</h1>
                            </div>

                            <form action="<?= base_url('auth/register') ?>" class="user" method="post">
                                <div class="form-group">
                                    <input class="form-control form-control-user" id="name" name="name" placeholder="Name" type="text" value="<?= set_value('name') ?>">

                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-user" id="email" name="email" placeholder="Email Address" type="text" value="<?= set_value('email') ?>">

                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" id="password" name="password" placeholder="Password" type="password">
                                    </div>

                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" id="repeat_password" name="repeat_password" placeholder="Repeat Password" type="password">
                                    </div>

                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>

                                <button class="btn btn-block btn-primary btn-user" type="submit">
                                    Register Account
                                </button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/forgot_password') ?>">Forgot Password?</a>
                            </div>

                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth') ?>">Already have an account? Login!</a>
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