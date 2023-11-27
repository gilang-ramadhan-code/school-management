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
                            <div class="bg-password-image col-lg-6 d-none d-lg-block"></div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-2 text-gray-900">Forgot Your Password?</h1>

                                        <p class="mb-4">
                                            We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                                        </p>
                                    </div>

                                    <form class="user">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="email" placeholder="Email" type="email">
                                        </div>

                                        <button class="btn btn-block btn-primary btn-user" type="submit">
                                            Reset Password
                                        </button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register') ?>">Create an Account!</a>
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
        </div>
    </div>

    <?php $this->load->view('templates/script') ?>
</body>

</html>