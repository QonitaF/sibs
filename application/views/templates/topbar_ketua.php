<!-- PAGE CONTAINER-->
<div class="page-container">
    <?php if ($this->session->userdata('email')) : ?>
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <div class="form-header"></div>
                        <div class="header-button">

                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="<?= base_url('assets/images/users/' . $users["gambar_users"]); ?>" alt="<?= $users["name"] ?>" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><?= $users["name"] ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="<?= base_url('assets/images/users/' . $users["gambar_users"]); ?>" alt="<?= $users["name"] ?>" alt="John Doe" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="<?= base_url('ketua/profile'); ?>"><?= $users["name"]; ?></a>
                                                </h5>
                                                <span class="email"><?= $users["email"]; ?></span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="<?= base_url('ketua/profile'); ?>">
                                                    <i class="zmdi zmdi-account"></i>Profile</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="<?= base_url('Auth/logout') ?>">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->
    <?php endif; ?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">