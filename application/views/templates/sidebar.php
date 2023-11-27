<ul class="accordion bg-gradient-primary navbar-nav sidebar sidebar-dark" id="accordionSidebar">
    <a class="align-items-center d-flex justify-content-center sidebar-brand" href="<?= base_url('auth/dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>

        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('classes') ?>">
            <i class="fas fa-fw fa-users"></i>

            <span>Class</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('schedules') ?>">
            <i class="fas fa-fw fa-calendar"></i>

            <span>Schedule</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('scores') ?>">
            <i class="fas fa-fw fa-book"></i>

            <span>Score</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('students') ?>">
            <i class="fas fa-fw fa-users"></i>

            <span>Student</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('subjects') ?>">
            <i class="fas fa-fw fa-book"></i>

            <span>Subject</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('teachers') ?>">
            <i class="fas fa-fw fa-users"></i>

            <span>Teacher</span>
        </a>
    </li>

    <hr class="d-none d-md-block sidebar-divider">

    <div class="d-none d-md-inline text-center">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>
</ul>