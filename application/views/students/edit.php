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

                    <form action="<?= base_url('students/edit/' . $student['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="<?= !set_value('name') ? $student['name'] : set_value('name') ?>">

                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>

                            <input class="form-control" id="date_of_birth" name="date_of_birth" type="date" value="<?= !set_value('date_of_birth') ? $student['date_of_birth'] : set_value('date_of_birth') ?>">

                            <?= form_error('date_of_birth', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>

                            <textarea class="form-control" id="address" name="address" placeholder="Address" rows="2"><?= !set_value('address') ? $student['address'] : set_value('address') ?></textarea>

                            <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="class_id">Class</label>

                            <select class="custom-select form-control" id="class_id" name="class_id">
                                <option>Select Class</option>

                                <?php foreach ($class as $row) : ?>
                                    <?php if (!set_value('class_id') && $row['id'] == $student['class_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('class_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('class_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button class="btn btn-block btn-primary btn-user" type="submit">
                            Edit Student
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