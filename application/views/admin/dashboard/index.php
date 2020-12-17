<h3 class="text-center">Selamat Datang Admin</h3>
<?php foreach ($abouts as $about) : ?>
<h3 class="text-center mt-3"><?= $about["nama_about"] ?></h3>
<a class="btn btn-dark" href="<?= base_url('admin/edit_about/' . $about["id_about"]); ?>">Update</a>
<?= $this->session->flashdata('message'); ?>

<div class="card mt-5" >
    <div class="card-body" style="margin-bottom: 450px;">
        <?= $about["keterangan"]; ?>
    </div>
</div>
<?php endforeach; ?>
