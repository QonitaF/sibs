<h2 class="text-center">DATA NASABAH</h2>
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
<div class="row m-t-30">
    <div class="col-md-12">
        <a href="<?= base_url('admin/create_nasabah'); ?>" class="au-btn btn-dark m-b-20"><i class="fas fa-plus"></i> Tambah</a>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>RT</th>
                        <th>Alamat</th>
                        <th>No Hp / WA</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $no = 1;
                    foreach ($nasabah as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->rt_users ?></td>
                            <td><?= $data->alamat_users ?></td>
                            <td><?= $data->telepon_users ?></td>
                            <td>
                                <a href="<?= base_url('admin/update_nasabah/' . $data->id_users); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="" data-toggle="modal" data-target="#ModalHapus<?= $data->id_users; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>








<!-- Modal -->