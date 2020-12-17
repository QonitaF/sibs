<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="<?= base_url(); ?>">
            <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
            <h1>SIBSE'18</h1>
        </a>
    </div>
    <div class="menu-sidebar__content ">
        <nav class="navbar-sidebar">

            <!-- menu nasabah -->
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?= base_url(); ?>">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('pendaftaran'); ?>">
                        <i class="fas fa-sign-in-alt"></i>
                        Pendaftaran
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('katalog_sampah'); ?>">
                        <i class="fas fa-trash-alt"></i>
                        Katalog Sampah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('auth'); ?>">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>
                </li>
            </ul>
            <!-- END:: menu nasabah -->
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->