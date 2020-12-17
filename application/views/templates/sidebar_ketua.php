<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="<?= base_url(); ?>">
            <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
            <h1>SIBSE'18</h1>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">

            <!-- menu admin -->
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?= base_url('ketua/penjualan_sampah'); ?>">
                        <i class="fas fa-shopping-basket"></i>
                        Penjualan Sampah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('ketua/laporan_keuangan'); ?>">
                        <i class="far fa-clipboard"></i>
                        Laporan
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('ketua/profile'); ?>">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Auth/logout'); ?>">
                        <i class="fas fa-sign-in-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
            <!-- END::menu admin -->
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->