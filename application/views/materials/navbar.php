<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
        <?php
        if ($this->session->userdata('access') == "admin") { ?>
            <li class="nav-item">
                <a href="<?= base_url('beranda') ?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('data_team') ?>" class="nav-link">Team</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('rundown') ?>" class="nav-link">Matching</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('history') ?>" class="nav-link">History Pertandingan</a>
            </li>
        <?php } else {
        ?>
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('data') ?>" class="nav-link">Data Diri</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('history_tournament') ?>" class="nav-link">History Pertandingan</a>
            </li>

        <?php } ?>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="nav-link" style="padding-right: 0px;"><?= $this->session->userdata('nama_team') ?></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" style="padding-top: 0px;">
                <img src="<?= base_url('assets/material/') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="width: 40px; height: 40px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>


        </div>

    </div>
</nav>
<!-- /.navbar -->