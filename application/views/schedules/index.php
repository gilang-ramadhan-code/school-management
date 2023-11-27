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

                    <a class="btn btn-primary mb-3" href="<?= base_url('schedules/add') ?>">
                        Add New Schedule
                    </a>

                    <div class="card mb-4 shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>Finish Time</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>

                                        <?php foreach ($schedule as $row) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td><?= $row['day'] ?></td>
                                                <td><?= $row['start_time'] ?></td>
                                                <td><?= $row['finish_time'] ?></td>
                                                <td><?= $row['class'] ?></td>
                                                <td><?= $row['subject'] ?></td>
                                                <td><?= $row['teacher'] ?></td>
                                                <td>
                                                    <a class="badge badge-warning" href="<?= base_url('schedules/edit/' . $row['id']) ?>">Edit</a>

                                                    <a class="badge badge-danger" href="<?= base_url('schedules/delete/' . $row['id']) ?>">Delete</a>
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