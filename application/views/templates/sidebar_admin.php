<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="<?= base_url(); ?>">
            <!-- <img src="images/icon/logo.png" alt="Cool Admin" /> -->
            <h1>SIBSE'18</h1>
        </a>
    </div>
    <div class="menu-sidebar__content">
        <nav class="navbar-sidebar">

            <!-- menu admin -->
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?= base_url('admin'); ?>">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/SaldoNasabah'); ?>">
                        <i class="fas fa-database"></i>
                        Data Saldo Nasabah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/nasabah'); ?>">
                        <i class="fas fa-database"></i>
                        Data Nasabah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/katalog_sampah'); ?>">
                        <i class="fas fa-trash-alt"></i>
                        Katalog Sampah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/penjualan_sampah'); ?>">
                        <i class="fas fa-shopping-basket"></i>
                        Penjualan Sampah
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/laporan'); ?>">
                        <i class="far fa-clipboard"></i>
                        Laporan
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/profile'); ?>">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Auth/logout') ?>">
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