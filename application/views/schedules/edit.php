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

                    <form action="<?= base_url('schedules/edit/' . $schedule['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="day">Day</label>

                            <select class="custom-select form-control" id="day" name="day">
                                <option>Select Day</option>

                                <?php foreach ($day as $row) : ?>
                                    <?php if (!set_value('day') && $row == $schedule['day']) : ?>
                                        <option selected value="<?= $row ?>"><?= $row ?></option>
                                    <?php elseif ($row == set_value('day')) : ?>
                                        <option selected value="<?= $row ?>"><?= $row ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row ?>"><?= $row ?></option>
                                    <?php endif ?>

                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('day', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time</label>

                            <input class="form-control" id="start_time" name="start_time" type="time" value="<?= !set_value('start_time') ? $schedule['start_time'] : set_value('start_time') ?>">

                            <?= form_error('start_time', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="finish_time">Finish Time</label>

                            <input class="form-control" id="finish_time" name="finish_time" type="time" value="<?= !set_value('finish_time') ? $schedule['finish_time'] : set_value('finish_time') ?>">

                            <?= form_error('finish_time', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="class_id">Class</label>

                            <select class="custom-select form-control" id="class_id" name="class_id">
                                <option>Select Class</option>

                                <?php foreach ($class as $row) : ?>
                                    <?php if (!set_value('class_id') && $row['id'] == $schedule['class_id']) : ?>
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

                        <div class="form-group">
                            <label for="subject_id">Subject</label>

                            <select class="custom-select form-control" id="subject_id" name="subject_id">
                                <option>Select Subject</option>

                                <?php foreach ($subject as $row) : ?>
                                    <?php if (!set_value('subject_id') && $row['id'] == $schedule['subject_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('class_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('subject_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="teacher_id">Teacher</label>

                            <select class="custom-select form-control" id="teacher_id" name="teacher_id">
                                <option>Select Teacher</option>

                                <?php foreach ($teacher as $row) : ?>
                                    <?php if (!set_value('teacher_id') && $row['id'] == $schedule['teacher_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('class_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('teacher_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button class="btn btn-block btn-primary btn-user" type="submit">
                            Add New Schedule
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