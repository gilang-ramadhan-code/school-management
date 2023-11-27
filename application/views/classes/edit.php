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

                    <form action="<?= base_url('classes/edit/' . $class['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="<?= !set_value('name') ? $class['name'] : set_value('name') ?>">

                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="homeroom_teacher_id">Homeroom Teacher</label>

                            <select class="custom-select form-control" id="homeroom_teacher_id" name="homeroom_teacher_id">
                                <option>Select Homeroom Teacher</option>

                                <?php foreach ($teacher as $row) : ?>
                                    <?php if (!set_value('homeroom_teacher_id') && $row['id'] == $class['homeroom_teacher_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('homeroom_teacher_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('homeroom_teacher_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button class="btn btn-block btn-primary btn-user" type="submit">
                            Edit Class
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