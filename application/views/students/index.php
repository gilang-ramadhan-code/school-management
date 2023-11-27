<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head') ?>

    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('templates/sidebar') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('templates/topbar') ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

                    <?= $this->session->flashdata('message'); ?>

                    <a class="btn btn-primary mb-3" href="<?= base_url('students/add') ?>">
                        Add New Student
                    </a>

                    <div class="card mb-4 shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>Class</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>

                                        <?php foreach ($student as $row) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= date('d F Y', strtotime($row['date_of_birth'])) ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['class'] ?></td>
                                                <td>
                                                    <a class="badge badge-warning" href="<?= base_url('students/edit/' . $row['id']) ?>">Edit</a>

                                                    <a class="badge badge-danger" href="<?= base_url('students/delete/' . $row['id']) ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('templates/footer') ?>
        </div>
    </div>

    <?php $this->load->view('templates/script') ?>

    <?php $this->load->view('templates/script_table') ?>
</body>

</html>