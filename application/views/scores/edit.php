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

                    <form action="<?= base_url('scores/edit/' . $score['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="student_id">Student</label>

                            <select class="custom-select form-control" id="student_id" name="student_id">
                                <option>Select Student</option>

                                <?php foreach ($student as $row) : ?>
                                    <?php if (!set_value('student_id') && $row['id'] == $score['student_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('student_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('student_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="subject_id">Subject</label>

                            <select class="custom-select form-control" id="subject_id" name="subject_id">
                                <option>Select Subject</option>

                                <?php foreach ($subject as $row) : ?>
                                    <?php if (!set_value('subject_id') && $row['id'] == $score['subject_id']) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php elseif ($row['id'] == set_value('subject_id')) : ?>
                                        <option selected value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>

                            <?= form_error('subject_id', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="score">Score</label>

                            <input class="form-control" id="score" name="score" placeholder="Score" type="text" value="<?= !set_value('score') ? $score['score'] : set_value('score') ?>">

                            <?= form_error('score', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <button class="btn btn-block btn-primary btn-user" type="submit">
                            Add New Score
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