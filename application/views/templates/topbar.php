<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button class="btn btn-link d-md-none mr-3 rounded-circle" id="sidebarToggleTop">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                <span class="d-none d-lg-inline mr-2 small text-gray-600"><?= $user['name'] ?></span>

                <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile.svg">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-fw fa-sm fa-user mr-2 text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt fa-sm mr-2 text-gray-400"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>