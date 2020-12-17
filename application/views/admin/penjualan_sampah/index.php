<h2 class="text-center">PENJUALAN SAMPAH</h2>

<div class="row m-t-30">
    <div class="col-md-12">
        <a href="<?= base_url('admin/create_penjualan_sampah'); ?>" class="au-btn btn-dark m-b-20"><i class="fas fa-plus"></i> Tambah</a>
        <a href="<?= base_url('admin/penjualan_sampah_pdf'); ?>" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> Cetak</a>
        <!-- DATA TABLE-->
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jenis Sampah</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penjualan as $penjual) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $penjual["time_create_penjualan"]; ?></td>
                            <td><?= $penjual["name"]; ?></td>
                            <td><?= $penjual["nama_katalog"]; ?></td>
                            <td><?= $penjual["berat_penjualan"]; ?></td>
                            <td>Rp. <?= number_format($penjual['harga_penjualan'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($penjual['total_penjualan'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="<?= base_url('admin/update_penjualan_sampah/' . $penjual["id_penjualan"]); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Data Penjualan Sampah Akan Terhapus');" href="<?= base_url('admin/delete_penjualan_sampah/' . $penjual["id_penjualan"]); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<div class="row m-t-30">
    <div class="col-sm-12">
        <?php foreach ($totalpenjualan as $data) : ?>
            <p><b>Total Penjualan Sampah :</b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></p>

        <?php endforeach ?>
    </div>
</div>