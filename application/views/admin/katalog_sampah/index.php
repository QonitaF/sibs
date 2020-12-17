<h2 class="text-center">KATALOG SAMPAH</h2>

<div class="row m-t-30">
    <div class="col-md-12">
        <a href="<?= base_url('admin/create_katalog_sampah'); ?>" class="au-btn btn-dark m-b-20"><i class="fas fa-plus"></i> Tambah</a>
        <!-- DATA TABLE-->
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Sampah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($katalog as $kat) : ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kat["nama_katalog"]; ?></td>
                            <td><?= $kat["nama_jenis_sampah"]; ?></td>
                            <td><?= $kat["satuan_katalog"] ?></td>
                            <td>Rp. <?= number_format($kat["harga_katalog"], 0, ',', '.'); ?></td>
                            <td>
                                <img class="img-thumbnail" width="50" src="<?= base_url('assets/images/katalog/' . $kat["gambar_katalog"]); ?>" alt="">
                            </td>
                            <td><?= $kat["keterangan_katalog"] ?></td>
                            <td>
                                <a href="<?= base_url('admin/update_katalog_sampah/' . $kat["id_katalog"]); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Data katalog akan terhapus.');" href="<?= base_url('admin/delete_katalog_sampah/' . $kat["id_katalog"]); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>