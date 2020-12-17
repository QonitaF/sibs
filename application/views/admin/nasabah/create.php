<h1 class="text-center">Data Nasabah</h1>

<?php $errors = $this->session->flashdata('errors'); ?>

<?php if (!empty($errors)) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">
                <?php foreach ($errors as $key => $error) { ?>
                    <?php echo "$error<br>"; ?>
                <?php } ?>
            </div>
        </div>
    </div>

<?php elseif ($msg = $this->session->flashdata('error_login')) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">
                <?= $msg ?>
            </div>
        </div>
    </div>

<?php elseif ($msg = $this->session->flashdata('success_login')) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success text-center">
                <?= $msg ?>
            </div>
        </div>
    </div>

<?php endif; ?>

<div class="row mt-4 justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/registerNasabah') ?>" method="post">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="alamatemail@gmail.com" required autofocus>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input name="confrim_password" type="password" id="inputPassword" class="form-control" placeholder="Confrim Password" required>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" name="rt_users" class="form-control" id="rt" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat_users" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp / WA</label>
                        <input type="text" name="telepon_users" class="form-control" id="telepon_users" required>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-dark float-right">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>