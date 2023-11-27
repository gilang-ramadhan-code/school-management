<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('templates/sidebar') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('templates/topbar') ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                    <form action="<?= base_url('subjects/add') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="<?= set_value('name') ?>">

                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button class="btn btn-block btn-primary btn-user" type="submit">
                            Add New Subject
                        </button>
                    </form>
                </div>
            </div>

            <?php $this->load->view('templates/footer') ?>
        </div>
    </div>

    <?php $this->load->view('templates/script') ?>
</body>

</html>